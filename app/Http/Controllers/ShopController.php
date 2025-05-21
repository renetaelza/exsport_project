<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ShopController extends Controller
{
    public function view()
    {
        $products = Products::all();
        return view('landing', ['products' => $products]);
    }

    public function shopView(Request $request)
    {
        $query = Products::query();

        // Cek apakah kategori dipilih
        if ($request->filled('category') && $request->category !== '') {
            $query->where('category', $request->category);
        }

        // Jika search juga diisi
        if ($request->filled('search') && $request->search !== '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        // Ambil semua kategori unik untuk dropdown
        $categories = Products::select('category')->distinct()->pluck('category');

        return view('shop', compact('products', 'categories'));
    }
}
