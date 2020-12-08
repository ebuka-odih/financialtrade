<?php

namespace App\Http\Controllers\Admin;

use App\Deposits;
use App\Http\Controllers\Controller;
use App\InvestPlans;
use App\Mail\DepositMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminDeposit extends Controller
{

    public function all_deposits()
    {
        $users_deposits = Deposits::all();
        return view('admin.deposits', compact('users_deposits'));
    }

    public function deposit_details($id)
    {
        $deposit = Deposits::findOrFail($id);
        return view('admin.deposit-details', compact('deposit'));
    }


    public function approve_deposit($deposit){
//        $user = User::where;
        $dep = Deposits::findOrFail($deposit);
        $user = User::findOrFail($dep->user_id);
        $investment_plan = InvestPlans::findOrFail($dep->invest_plans_id);
        $new_wallet = $user->acct_wallet + $dep->amount;
        $user->acct_wallet = $new_wallet;
        $dep->approved_date = Carbon::now();
//        $dep->approved_date->format('Y-m-d');
        $dep->status = 'approved';
        $data = ['user' => $user, 'investment' => $investment_plan, 'deposit' => $dep];
        Mail::to($dep->user->email)->send( new DepositMail($data));
        $user->save();
        $dep->save();
        return redirect()->back();
    }

    public function user_deposits($id)
    {
        $user_details = User::findOrFail($id);
        $deposits= User::with('deposits')->findOrFail($id);
        return view('admin.user-deposits2', compact('user_details', 'deposits'));
    }

}
