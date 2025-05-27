<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function showDetail($id)
    {
        // Ambil produk berdasarkan ID
        $product = Products::findOrFail($id);

        $products = Products::all();

        return view('detail', [
            'product' => $product,
            'products' => $products
        ]);
    }
}
