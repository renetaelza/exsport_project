<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AuthController;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
| 
*/

// Halaman landing
Route::get('/', function () {
    return view('landing');
});

// Halaman login dan proses login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Group untuk admin
Route::prefix('admin')->group(function () {
    // Hanya bisa diakses oleh admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
});
// Redirect ke halaman login jika user tidak terautentikasi
Route::get('/dashboard', [AuthController::class, 'dashboard']);
