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

    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('admin.users.edit', $data);
    }

    public function proccessedit(Request $request, User $user)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ];
        $message = [
            'required' => 'This field is required',
            'email' => 'This field must be an email',
        ];
        $this->validate($request, $rule, $message);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect('admin/user');
    }
}
