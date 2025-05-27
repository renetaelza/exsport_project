<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function view()
    {
        $products = Products::all();
        return view('products', ['products' => $products]);
    }

    public function admin()
    {
        $products = Products::all();
        return view('admin.create', ['products' => $products]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|array',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'colour' => 'required|array',
            'category' => 'required|string|max:100',
            'image_url.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image_url')) {
            foreach ($request->file('image_url') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/products', $filename, 'public');
                $imagePaths[] = $path;
            }
        }

        $data['image_url'] = $imagePaths;

        Products::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'colour' => $data['colour'],
            'category' => $data['category'],
            'image_url' => $data['image_url'],
        ]);

        return redirect(route('products.view'))->with('success', 'Produk berhasil ditambahkan!');
    }
    
}
