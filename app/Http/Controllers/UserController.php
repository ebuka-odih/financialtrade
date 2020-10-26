<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }


}
