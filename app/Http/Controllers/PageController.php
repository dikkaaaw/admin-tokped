<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PageController extends Controller
{
    protected $cartData;

    public function __construct()
    {
        $this->cartData = $this->showCart();
    }

    public function page($page)
    {
        return view('public.' . $page);
    }

    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        $dataOrder = $this->getOldOrder();

        // Kirim data produk dan data keranjang ke view
        return view('public.homepage', [
            'products' => $products,
            'dataOrder' => $dataOrder,
            'totalPrice' => $this->cartData['totalPrice'],
            'totalQuantity' => $this->cartData['totalQuantity'],
            'message' => $this->cartData['message'] ?? null
        ]);
    }

    public function getOldOrder()
    {
        // Pastikan dataOrder adalah koleksi dan filter dilakukan dengan benar
        $dataOrder = collect($this->cartData['dataOrder'])  // Gunakan collect() untuk mengubah array menjadi Collection
            ->filter(function ($order) {
                return !$order->is_checkout;  // Hanya pilih order yang is_checkout = 0
            })
            ->map(function ($order) {
                // Mengambil produk terkait berdasarkan id_product pada order
                $product = Product::find($order->id_product);  // Menggunakan -> untuk mengakses properti objek

                // Jika produk ditemukan, tambahkan nama produk pada order
                if ($product) {
                    $order->product_name = $product->name;  // Menambahkan field 'product_name' pada order
                } else {
                    $order->product_name = 'Product not found'; // Jika produk tidak ditemukan
                }

                // Kembalikan order yang sudah ditambahkan field 'product_name'
                return $order;
            });

        return $dataOrder;
    }


    // GET: Menampilkan detail produk berdasarkan ID
    public function show($id)
    {
        $product = Product::find($id); // Mencari produk berdasarkan ID

        // Jika produk tidak ditemukan, kembalikan error
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product); // Mengembalikan detail produk dalam format JSON
    }

    // POST: Menambahkan produk baru ke keranjang
    public function storeToCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        // Buat data order baru
        $order = Order::create([
            'id_user' => Auth::id(),  // Sesuaikan dengan ID user yang sedang login
            'id_product' => $request->id,
            'is_checkout' => 0,
            'quantity' => $request->quantity,
        ]);

        // Mengarahkan ke homepage setelah menambahkan ke keranjang
        return redirect()->route('homepage');
    }

    public function showCart()
    {
        // Ambil data order untuk user yang sedang login
        $userId = Auth::id();  // Atau sesuaikan dengan ID user yang sedang login
        $dataOrder = Order::where('id_user', $userId)
            ->get();  // Mengambil koleksi (Collection)

        // Cek apakah ada data order yang ditemukan
        if ($dataOrder->isEmpty()) {
            return [
                'dataOrder' => [],
                'totalPrice' => 0,
                'totalQuantity' => 0,
                'message' => 'Your cart is empty.'
            ];
        }

        // Menghitung total harga dan jumlah item dalam keranjang
        $totalPrice = 0;
        $totalQuantity = 0;

        // Filter untuk mengambil hanya yang is_checkout = 0, lalu map untuk memproses produk
        $dataOrder = $dataOrder->filter(function ($order) {
            return !$order->is_checkout;  // Pastikan hanya yang belum dicheckout
        })->map(function ($order) use (&$totalPrice, &$totalQuantity) {
            // Mengambil produk terkait berdasarkan id_product pada order
            $product = Product::find($order->id_product);

            // Menghitung harga per produk dan total harga per order
            $pricePerProduct = $product ? (int)$product->price : 0;
            $totalPricePerOrder = $product ? (int)$pricePerProduct * (int)$order->quantity : 0;
            $order->stock_per_product = $product->stock;

            // Menambahkan harga per produk dan total harga per order
            $order->price_per_product = $pricePerProduct;
            $order->total_price = $totalPricePerOrder;

            // Menambahkan ke total harga dan total quantity
            $totalPrice += $totalPricePerOrder;
            $totalQuantity += $order->quantity;

            return $order;
        });

        // Kembalikan data yang diperlukan
        return collect([
            'dataOrder' => $dataOrder,
            'totalPrice' => $totalPrice,
            'totalQuantity' => $dataOrder->count(),
            'message' => null
        ]);
    }

    // PUT/PATCH: Memperbarui data produk berdasarkan ID
    public function update(Request $request)
    {
        // Mendapatkan dataOrder yang dikirimkan dari form sebagai JSON
        $newDataOrder = json_decode($request->input('dataOrder'), true);  // Mengubah JSON menjadi array

        if (!$newDataOrder) {
            return redirect()->route('homepage')->withErrors('No changes in cart.'); // Menangani jika dataOrder kosong
        }

        // Iterasi setiap order dalam dataOrder
        foreach ($newDataOrder as $newOrder) {
            // Ambil order berdasarkan id dari request
            $oldOrder = Order::where('id', $newOrder['id'])
                ->where('is_checkout', 0)  // Pastikan hanya yang is_checkout = 0
                ->first();

            // Jika order ditemukan, lakukan update
            if ($oldOrder) {
                // Update kuantitas jika ada
                if (isset($newOrder['quantity']) && $oldOrder->quantity !== $newOrder['quantity']) {
                    $oldOrder->quantity = $newOrder['quantity'];  // Menggunakan $newOrder untuk update quantity
                }

                // Simpan message (note) untuk order yang sudah diperbarui
                if ($note = $request->input('note')) {
                    // Simpan note pada semua item yang sama
                    OrderMessage::create([
                        'id_order' => $oldOrder->id,
                        'message' => $note  // Menyimpan note yang diterapkan
                    ]);
                }

                // Update is_checkout menjadi 1, jika kuantitas sudah diproses
                $oldOrder->is_checkout = 1;
                $oldOrder->save();  // Simpan perubahan yang ada

                // Jika kuantitas 0, hapus order dari keranjang
                if ($oldOrder->quantity <= 0) {
                    $oldOrder->delete();
                }

                // update stock product
                $product = Product::find($oldOrder->id_product);
                if ($product) {
                    $product->stock = $product->stock - $oldOrder->quantity;
                    $product->save();
                }
            }
        }

        // Kembalikan respons yang sesuai
        return redirect()->route('homepage.payment')->with('status', 'Cart updated successfully');
    }


    // DELETE: Menghapus produk berdasarkan ID
    public function destroy($idOrder)
    {
        $order = Order::find($idOrder); // Mencari produk berdasarkan ID

        // Jika produk tidak ditemukan, kembalikan error
        if (!$order) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $order->delete(); // Menghapus produk

        return redirect()->route('homepage');
    }

    public function searchProduct(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search_input' => 'required|string|max:255',
        ]);

        // Ambil input pencarian dan ubah menjadi huruf kecil
        $searchInput = strtolower($request->input('search_input'));

        // Cari produk yang namanya mengandung input pencarian
        $products = Product::whereRaw('LOWER(name) LIKE ?', ["%{$searchInput}%"])->get();

        // Jika tidak ada produk yang ditemukan, kembalikan pesan
        if ($products->isEmpty()) {
            return redirect()->route('homepage')->with('status', 'No products found');
        }

        $dataOrder = $this->getOldOrder();
        // Kembalikan hasil pencarian dalam format JSON
        return view('public.homepage', [
            'products' => $products,
            'dataOrder' => $dataOrder,
            'totalPrice' => $this->cartData['totalPrice'],
            'totalQuantity' => $this->cartData['totalQuantity'],
            'message' => $this->cartData['message'] ?? null
        ]);
    }

    public function paymentView()
    {
        return view('public.payment');
    }
}
