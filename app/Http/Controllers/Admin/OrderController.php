<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'search'    => $request->search ? $request->search : '',
        ];
        $orders = new Order;

        $data['view_orders'] = $orders->filter($filters)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        return view('admin.orders.order', $data);
    }
}
