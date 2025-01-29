@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">All Transactions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
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
                        <th>Transaction ID</th>
                        <th>Customer Name</th>
                        <th>Products</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyTransactions = [
                            [
                                'id' => 'TRX-001',
                                'customer_name' => 'John Doe',
                                'products' => 'Laptop Asus',
                                'total_amount' => 12000000,
                                'status' => 'Completed',
                                'date' => '2023-07-20',
                            ],
                            [
                                'id' => 'TRX-002',
                                'customer_name' => 'Jane Smith',
                                'products' => 'Samsung Galaxy S21',
                                'total_amount' => 15000000,
                                'status' => 'Pending',
                                'date' => '2023-07-19',
                            ],
                            [
                                'id' => 'TRX-003',
                                'customer_name' => 'Mike Johnson',
                                'products' => 'Nike Air Max',
                                'total_amount' => 2000000,
                                'status' => 'Processing',
                                'date' => '2023-07-18',
                            ],
                        ];
                    @endphp

                    @foreach ($dummyTransactions as $transaction)
                        <tr>
                            <td>{{ $transaction['id'] }}</td>
                            <td>{{ $transaction['customer_name'] }}</td>
                            <td>{{ $transaction['products'] }}</td>
                            <td>Rp {{ number_format($transaction['total_amount'], 0, ',', '.') }}</td>
                            <td>
                                @if ($transaction['status'] == 'Completed')
                                    <span class="badge badge-success">{{ $transaction['status'] }}</span>
                                @elseif($transaction['status'] == 'Pending')
                                    <span class="badge badge-warning">{{ $transaction['status'] }}</span>
                                @else
                                    <span class="badge badge-info">{{ $transaction['status'] }}</span>
                                @endif
                            </td>
                            <td>{{ $transaction['date'] }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">View</a>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
