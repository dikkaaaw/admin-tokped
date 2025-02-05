<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderMessage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // search filter
        $filters = [
            'search'    => $request->search ? $request->search : '',
        ];
        $orders = new Order;
        $users = new User;
        $products = new Product;
        $messages = new OrderMessage;

        $data['allOrders'] = $orders->filter($filters)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        foreach ($data['allOrders'] as $order) {
            // get user and product data
            $order->user = $users->find($order->id_user);
            $order->product = $products->find($order->id_product);

            // get messages
            $tempMessage = $messages->where('id_order', $order->id)->pluck('message')->first();

            if ($tempMessage) {
                $order->message = $tempMessage;
            } else {
                $order->message = '';
            }

            // set status
            $tempStatus = $order->is_checkout;
            $order->is_checkout = $tempStatus == 1 ? 'Checkout' : 'Not Checkout';

            $order->total_price = $order->product->price * $order->quantity;
        }

        return view('admin.orders.order', $data);
    }
}
