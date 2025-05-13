<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dummy data (angka statis)
        $total_orders = 150;
        $total_payments = 12500000; // Rp12.500.000
        $total_paid = 120;
        $total_not_paid = 30;

        return view('admin.dashboard', compact('total_orders', 'total_payments', 'total_paid', 'total_not_paid'));
    }
}
