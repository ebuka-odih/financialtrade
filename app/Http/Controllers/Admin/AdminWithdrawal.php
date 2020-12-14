<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WithdrawMail;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminWithdrawal extends Controller
{
    public function all_withdrawal()
    {
        $users_withdrawals = Withdrawal::all();
        return view('admin.withdrawals', compact('users_withdrawals'));
    }

    public function accept_withdrawal($withdraw)
    {
        $dep = Withdrawal::findOrFail($withdraw);
        $user = User::findOrFail($dep->user_id);
        if ($user->acct_wallet < 0){
            return redirect()->back()->with('reject', 'Sorry, client account does not have enough cach');
        }else{
            $new_wallet = $user->acct_wallet - $dep->amount;
            $user->acct_wallet = $new_wallet;
            $data = ['user' => $user, 'withdraw' => $dep];
            Mail::to($dep->user->email)->send( new WithdrawMail($data));
            $user->save();
            $dep->status = 'approved';
            $dep->approved_date = Carbon::now()->toDateString();
            $dep->save();
            return redirect()->back();
        }

    }

    public function show_user_withdraw($id)
    {
        $user_details = User::findOrFail($id);
        $user_withdrawals = User::with('withdrawal')->findOrFail($id);
        return view('admin.user-withdrawal', compact('user_withdrawals', 'user_details'));
    }

    public function withdrawal_details($id)
    {
        $show_withdraw = Withdrawal::findOrFail($id);
        return view('admin.withdrawal-details', compact('show_withdraw'));
    }

    public function delete_withdrawal($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->delete();
        return redirect()->back();
    }

}
