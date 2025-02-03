<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'search'    => $request->search ? $request->search : '',
            'is_admin'  => 0,
        ];
        $users = new User;

        $data['view_users'] = $users->filter($filters)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('admin.users.user', $data);
    }
}
