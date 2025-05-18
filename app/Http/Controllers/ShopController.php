<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ShopController extends Controller
{
    public function showShop()
    {
        return view("shop");
    }
}
// uey ee