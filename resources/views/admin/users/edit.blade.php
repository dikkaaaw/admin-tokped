@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-3 card">
        <div class="card-body">
            <form action="{{ URL('admin/user/proccessedit/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        placeholder="Enter user name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address" name="address" value="{{ $user->address }}"
                        placeholder="Enter Address" required>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ URL('admin/user') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
