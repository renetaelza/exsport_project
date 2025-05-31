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
        $cart = session('cart', []);
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

    public function getProduct($id)
    {
        $product = Products::findOrFail($id);

        $productNameForFile = str_replace(' ', '-', $product->name);
        $colors = $product->colour;
        $firstColor = count($colors) > 0 ? strtolower($colors[0]) : null;
        $mainImageBase = $firstColor ? $productNameForFile . '_' . $firstColor : $productNameForFile;

        if (file_exists(public_path('products/' . $mainImageBase . '.png'))) {
            $imagePath = asset('products/' . $mainImageBase . '.png');
        } elseif (file_exists(public_path('products/' . $mainImageBase . '.jpg'))) {
            $imagePath = asset('products/' . $mainImageBase . '.jpg');
        } else {
            $imagePath = asset('products/default.png');
        }

        return response()->json([
            'title'       => $product->name,
            'color'       => count($colors) > 0 ? implode(' / ', $colors) : 'N/A',
            'quantity'    => 1,
            'price'       => $product->price,
            'description' => $product->description,
            'image'       => $imagePath,
        ]);
    }
}
