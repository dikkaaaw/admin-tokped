@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-lg">All Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dummyUsers = [
                            [
                                'id' => 1,
                                'name' => 'John Doe',
                                'email' => 'john@example.com',
                                'role' => 'Admin',
                                'created_at' => '2023-01-01',
                            ],
                            [
                                'id' => 2,
                                'name' => 'Jane Smith',
                                'email' => 'jane@example.com',
                                'role' => 'User',
                                'created_at' => '2023-01-02',
                            ],
                            [
                                'id' => 3,
                                'name' => 'Bob Wilson',
                                'email' => 'bob@example.com',
                                'role' => 'User',
                                'created_at' => '2023-01-03',
                            ],
                        ];
                    @endphp

                    @foreach ($dummyUsers as $user)
                        <tr>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
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
