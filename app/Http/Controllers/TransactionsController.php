<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionsController extends Controller
{
    public function showTransactionsDashboard() {
        $transactions = Transaction::all();
        return view('transaction', ['transactions' => $transactions]);
    }
}
