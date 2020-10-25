<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWithdrawal extends Controller
{

    public function all_withdrawal()
    {
        return view('admin.admin-withdrawal-list');
    }
}
