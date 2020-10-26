<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function homeInvestPlan()
    {
        $invest_plans = InvestPlans::all();
        return view('frontpage.index', compact('invest_plans'));
    }
}
