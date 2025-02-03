<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $products = new Order;

        $data['view_orders'] = $products->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('admin.orders.order', $data);
    }
}
