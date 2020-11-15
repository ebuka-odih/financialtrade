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
    public function why_ftm()
    {
        return view('frontpage.why-ftm');
    }

    public function contact_us()
    {
        return view('frontpage.contact-us');
    }

    public function risk(){
        return view('frontpage.policies-regulation');
    }

    public function policy()
    {
        return view('frontpage.policy-statement');
    }
}
