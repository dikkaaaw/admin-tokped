<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $allOrder = Order::where('is_checkout', 1)->get();
        $allProduct = Product::all();

        $dataAll = collect($allOrder)->filter(function ($order) {
            return $order->is_checkout;
        })->map(function ($order) use ($allProduct) {
            foreach ($allProduct as $product) {
                if ($order->id_product === $product->id) {
                    $pricePerProduct = $product->price;
                    $order->totalAmount = $order->quantity * $pricePerProduct;
                }
            }

            return $order;
        });

        // ambil total order
        $totalOrder = $dataAll->count();

        // ambil total income
        $totalIncome = $dataAll->sum('totalAmount');

        // ambil total user
        $totalUser = User::where('is_admin', 0)->count();

        // ambil kategori unique
        $totalProduct = $allProduct->pluck('name')->unique()->count();

        return view('admin.dashboard.dashboard', [
            'totalOrder' => $totalOrder,
            'totalIncome' => $totalIncome,
            'totalUser' => $totalUser,
            'totalProduct' => $totalProduct,
            'title' => 'Dashboard',
        ]);
    }
}
