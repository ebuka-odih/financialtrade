<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function deposit_history()
    {
        return view('dashboard.transactions.deposit-history');
    }

    public function withdrawal_history()
    {
        return view('dashboard.transactions.withdraw-history');
    }
}
