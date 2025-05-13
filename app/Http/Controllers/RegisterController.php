<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function create(Request $request)
    {
        $dataAccount = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = Account::create([
            'name' => $dataAccount['name'],
            'email' => $dataAccount['email'],
            'password' => Hash::make($dataAccount['password']),
            'phone' => $dataAccount['phone'],
            'address' => $dataAccount['address'],
            'role' => 'user',
        ]);

        return redirect()->route('loginUser')->with('message', 'Registration successful! Please login.');
    }
}
