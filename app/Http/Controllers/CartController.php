<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    // Tambah produk ke keranjang
    public function add(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Tampilkan halaman keranjang
    public function index()
    {
        $cart = session('cart', []);
        $products = Products::whereIn('id', array_keys($cart))->get();

        return view('cart', compact('cart', 'products'));
    }

    // Update jumlah produk
    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$id]) && $quantity > 0) {
            $cart[$id] = $quantity;
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Jumlah produk diperbarui!');
    }

    // Hapus produk dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang!');
    }
}
