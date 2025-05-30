<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;

//LANDING PAGE
Route::get('/', function () {
    $category = request('category', 'Backpack');
    $products = Products::where('category', $category)->take(5)->get();

    return view('landing', compact('products', 'category'));
});

Route::get('/product-detail/{id}', [ShopController::class, 'getProduct']);

// LOGIN REGISTER USER
Route::get('/loginUser', [LoginController::class, 'showLoginForm'])->middleware('notAdmin')->name('loginUser');
Route::post('/loginUser', [LoginController::class, 'login'])->name('user.login');

Route::get('/registerUser', [RegisterController::class, 'showRegisterForm'])->middleware('notAdmin')->name('registerUser');
Route::post('/registerUser', [RegisterController::class, 'create'])->name('user.create');

Route::get('/account', [LoginController::class, 'showAccount'])->middleware('notAdmin')->name('account');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// SHOP & CART
Route::get('/cartView', [CartController::class, 'showCart'])->name('cartView');
Route::get('/shop', [ShopController::class, 'shopView'])->name('shopView');
// ADD TO CART
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// DETAIL PRODUCT
Route::get('/detail/{id}', [DetailController::class, 'showDetail'])->name('detailView');

// Group untuk admin
Route::prefix('admin')->group(function () {
    // Hanya bisa diakses oleh admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
});

// Redirect ke halaman login jika user tidak terautentikasi
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/adminView', [AdminController::class, 'showAdminDashboard'])->name('adminView');
Route::get('/productsView', [ProductsController::class, 'showProductsDashboard'])->name('productsView');
Route::get('/transactionsView', [TransactionsController::class, 'showTransactionsDashboard'])->name('transactionView');
