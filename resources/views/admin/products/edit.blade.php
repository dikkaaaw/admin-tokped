@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-3 card">
        <div class="card-body">
            <form action="{{ URL('admin/product/proccessedit/' . $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                        placeholder="Enter product name" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $product->price }}" placeholder="Enter price" min="0" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category"
                        value="{{ $product->category }}" placeholder="Enter category" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}"
                        placeholder="Enter stock quantity" min="0" required>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="mt-2"
                        width="100">
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection
