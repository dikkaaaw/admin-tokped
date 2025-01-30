<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class PageController extends Controller
{
    public function page($page)
    {
        return view('public.' . $page);
    }

    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('public.homepage', [
            'products' => $products,
        ]);
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

    // POST: Menambahkan produk baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Jika ada gambar, simpan gambar dan ambil path-nya
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Membuat produk baru
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'quantity' => $request->quantity,
            'image' => $imagePath,
        ]);

        return response()->json($product, 201); // Mengembalikan produk yang baru ditambahkan
    }

    // PUT/PATCH: Memperbarui data produk berdasarkan ID
    public function update(Request $request, $id)
    {
        $product = Product::find($id); // Mencari produk berdasarkan ID

        // Jika produk tidak ditemukan, kembalikan error
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validasi input
        $request->validate([
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Jika ada gambar baru, simpan gambar dan ambil path-nya
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Update produk
        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->category = $request->category ?? $product->category;
        $product->quantity = $request->quantity ?? $product->quantity;
        $product->save(); // Simpan perubahan

        return response()->json($product); // Mengembalikan produk yang sudah diperbarui
    }

    // DELETE: Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        $product = Product::find($id); // Mencari produk berdasarkan ID

        // Jika produk tidak ditemukan, kembalikan error
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete(); // Menghapus produk

        return response()->json(['message' => 'Product deleted successfully']); // Menyatakan penghapusan berhasil
    }
}
