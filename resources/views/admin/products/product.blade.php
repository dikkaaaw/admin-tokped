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
                        <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-3 card">
        <div class="card-body">
            <div class="mb-3 row">
                <div class="col-md-6">
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search products..."
                                value="{{ Request()->search }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                </div>
            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($view_products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <img src="{{ asset('dist/assets/img/buah/' . $product->image) }}" alt="{{ $product->name }}"
                                    width="50">
                            </td>
                            <td>
                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $product->id }}">Delete</button>
                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete
                                                    Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete {{ $product->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.product.delete', $product->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($view_products->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                    <p>No product found</p>
                </div>
            @endif
            <div class="mt-3">
                @if ($view_products->hasPages())
                    <nav>
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($view_products->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $view_products->previousPageUrl() }}"
                                        rel="prev">Previous</a>
                                </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($view_products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $view_products->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection
