<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Withdrawal;
use Illuminate\Http\Request;

class AdminWithdrawal extends Controller
{

    public function all_withdrawal()
    {
        $users_withdrawals = Withdrawal::all();
        return view('admin.admin-withdrawal-list', compact('users_withdrawals'));
    }
}
