<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'nullable|integer|min:1',
            'color' => 'nullable|string',
        ]);

        $product = Products::findOrFail($data['product_id']);

        $cart = session()->get('cart', []);

        $newProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'color' => $data['color'] ?? '',
            'quantity' => $data['quantity'] ?? 1,
        ];

        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $newProduct['id'] && $item['color'] == $newProduct['color']) {
                $item['quantity'] += $newProduct['quantity'];
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $cart[] = $newProduct;
        }

        session(['cart' => $cart]);

        return response()->json([
            'status' => 'success',
            'cart' => $cart
        ]);
    }

    public function getCartSession()
    {
        $cart = session()->get('cart', []);
        foreach ($cart as &$item) {
            $product = Products::find($item['id']);
            if ($product) {
                $item['price'] = $product->price;
            }
        }
        session(['cart' => $cart]);

        return response()->json($cart);
    }


    public function updateCartItem(Request $request)
    {
        $data = $request->validate([
            'index' => 'required|integer',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$data['index']])) {
            if ($data['quantity'] > 0) {
                $cart[$data['index']]['quantity'] = $data['quantity'];
            } else {
                array_splice($cart, $data['index'], 1);
            }
        }

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart]);
    }

    public function removeCartItem(Request $request)
    {
        $data = $request->validate(['index' => 'required|integer']);

        $cart = session()->get('cart', []);

        if (isset($cart[$data['index']])) {
            array_splice($cart, $data['index'], 1);
        }

        session(['cart' => $cart]);

        return response()->json(['cart' => $cart]);
    }
}
