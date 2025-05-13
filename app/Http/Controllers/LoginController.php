<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('account');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = Account::where('email', $credentials['email'])->first(); // Ambil user berdasarkan email

        if ($user) {
            // Cek apakah role user adalah 'admin'
            if ($user->role === 'admin') {
                // Jika admin, tidak perlu menggunakan bcrypt untuk pengecekan password
                if ($user->password === $credentials['password']) {
                    Auth::login($user, $request->filled('remember'));
                    $request->session()->regenerate();
                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->with('error', 'Password salah.');
                }
            }

            // Untuk user biasa, gunakan bcrypt untuk pengecekan password
            if (Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('account');
            }
        }

        return back()->with('error', 'Email atau password salah.');
    }


    public function showAccount()
    {
        if (!Auth::check()) {
            return redirect()->route('loginUser');
        }

        return view('account');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginUser');
    }
}
