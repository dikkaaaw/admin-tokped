<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $allOrders = Order::where('is_checkout', 1)->get();

        foreach ($allOrders as $order) {
            // get user info
            $user = User::where('id', $order->id_user)->first();
            if ($user) {
                $order->userName = $user->name;
            }

            // get product info
            $product = Product::where('id', $order->id_product)->first();
            if ($product) {
                $order->productName = $product->name;

                $order->totalAmount = $product->price * $order->quantity;
            }
        }

        return view('admin.transactions.transaction', [
            'title' => 'Transaction',
            'allTransaction' => $allOrders
        ]);
    }
}
