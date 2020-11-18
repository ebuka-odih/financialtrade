<?php

namespace App\Http\Controllers\Admin;

use App\Deposits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDeposit extends Controller
{

    public function all_deposits()
    {
        $users_deposits = Deposits::all();
        return view('admin.admin-deposits-list', compact('users_deposits'));
    }

    public function deposit_details($id)
    {
        $deposit = Deposits::findOrFail($id);
        return view('admin.user-deposits-details', compact('deposit'));
    }
}
