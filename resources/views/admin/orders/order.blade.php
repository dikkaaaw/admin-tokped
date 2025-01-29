@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">All Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-3 card">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Products</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyOrders = [
                            [
                                'id' => 'ORD-001',
                                'customer_name' => 'John Doe',
                                'products' => 'Laptop Asus (1x)',
                                'total_amount' => 12000000,
                                'status' => 'Pending',
                                'order_date' => '2024-01-15',
                            ],
                            [
                                'id' => 'ORD-002',
                                'customer_name' => 'Jane Smith',
                                'products' => 'Samsung Galaxy S21 (2x)',
                                'total_amount' => 30000000,
                                'status' => 'Completed',
                                'order_date' => '2024-01-14',
                            ],
                        ];
                    @endphp

                    @foreach ($dummyOrders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['customer_name'] }}</td>
                            <td>{{ $order['products'] }}</td>
                            <td>Rp {{ number_format($order['total_amount'], 0, ',', '.') }}</td>
                            <td>
                                <span
                                    class="badge {{ $order['status'] == 'Completed' ? 'badge-success' : 'badge-warning' }}">
                                    {{ $order['status'] }}
                                </span>
                            </td>
                            <td>{{ $order['order_date'] }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">View</a>
                                <button type="button" class="btn btn-sm btn-danger">Cancel</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
