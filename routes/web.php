<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

//LANDING PAGE
Route::get('/', function () {
    return view('landing');
});

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

// LOGIN REGISTER USER
Route::get('/loginUser', [LoginController::class, 'showLoginForm'])->name('loginUser');
Route::post('/loginUser', [LoginController::class, 'login'])->name('user.login');

Route::get('/registerUser', [RegisterController::class, 'showRegisterForm'])->name('registerUser');
Route::post('/registerUser', [RegisterController::class, 'create'])->name('user.create');

Route::get('/account', [LoginController::class, 'showAccount'])->name('account');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Group untuk admin
Route::prefix('admin')->group(function () {
    // Hanya bisa diakses oleh admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
});
// Redirect ke halaman login jika user tidak terautentikasi
Route::get('/dashboard', [AuthController::class, 'dashboard']);
