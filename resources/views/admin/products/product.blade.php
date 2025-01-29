@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">All Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyProducts = [
                            [
                                'id' => 1,
                                'name' => 'Laptop Asus',
                                'category' => 'Electronics',
                                'price' => 12000000,
                                'stock' => 5,
                            ],
                            [
                                'id' => 2,
                                'name' => 'Samsung Galaxy S21',
                                'category' => 'Smartphone',
                                'price' => 15000000,
                                'stock' => 10,
                            ],
                            [
                                'id' => 3,
                                'name' => 'Nike Air Max',
                                'category' => 'Shoes',
                                'price' => 2000000,
                                'stock' => 15,
                            ],
                        ];
                    @endphp

                    @foreach ($dummyProducts as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                            <td>{{ $product['stock'] }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
