<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_page()
    {
        return view('public.login.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah user ada dengan email yang diberikan
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ])->onlyInput('email');
        }

        // Cek apakah password yang dimasukkan benar
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Password yang Anda masukkan salah.',
            ])->onlyInput('email');
        }

        // Logika untuk cek email admin@admin.com
        if ($user->is_admin === 1) {
            // Redirect ke admin dashboard jika user admin
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('admin/dashboard');
        } else {
            // Jika bukan admin, arahkan ke halaman utama
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/');
        }
    }


    public function register_page()
    {
        return view('public.register.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        // Auth::login($user);

        return redirect()->intended('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function updateAddress(Request $request)
    {
        $user = User::find(Auth::id());
        if ($user) {
            $user->address = $request->address;
            $user->save();
        }

        return redirect()->back();
    }
}
