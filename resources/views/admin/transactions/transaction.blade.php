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
            <div class="mb-3 row">
                <div class="col-md-6">
                    <form method="GET" action="{{ route('admin.transaction.search') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search transaction..."
                                value="{{ request()->query('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.transaction.index') }}" class="btn btn-secondary">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                </div>
            </div>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer Name</th>
                        <th>Products</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($allTransaction as $transaction)
                        <tr>
                            <td>{{ 'TRANSACTION' . $transaction['id'] }}</td>
                            <td>{{ $transaction['userName'] }}</td>
                            <td>{{ $transaction['productName'] }}</td>
                            <td>Rp {{ number_format($transaction['totalAmount'], 0, ',', '.') }}</td>
                            <td>{{ $transaction['updated_at'] }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $transaction['id'] }}">Delete</button>
                                <div class="modal fade" id="deleteModal{{ $transaction['id'] }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $transaction['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $transaction['id'] }}">
                                                    Delete
                                                    Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete Transaction #{{ $transaction['id'] }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.transaction.delete', $transaction['id']) }}"
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
            @if ($allTransaction->isEmpty())
                <div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
                    <p>No transaction found</p>
                </div>
            @endif
        </div>
    </div>
@endsection
