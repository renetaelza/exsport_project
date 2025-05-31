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
        $user = Account::where('email', $credentials['email'])->first();

        if ($user) {
            if ($user->role === 'admin') {
                if ($user->password === $credentials['password']) {
                    Auth::login($user, $request->filled('remember'));
                    $request->session()->regenerate();

                    session([
                        'isLogin' => true,
                        'userId' => $user->id,
                        'userName' => $user->name,
                        'userRole' => $user->role,
                    ]);

                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->with('error', 'Password salah.');
                }
            }

            if (Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();

                session([
                    'isLogin' => true,
                    'userId' => $user->id,
                    'userName' => $user->name,
                    'userRole' => $user->role,
                ]);

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
