<?php

namespace App\Http\Controllers;

use App\Mail\AdminWithdrawAlert;
use App\Mail\RequestWithdraw;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WithdrawalController extends Controller
{
   public function withdrawal_history()
   {
//       return Carbon::now()->toDateString();
       $withdrawals = Withdrawal::whereUserId(auth()->id())->get();
       $withdraw_pending_cash = Withdrawal::whereUserId(auth()->id())->select('amount')->where('status', '=', 'pending')->sum('amount');
       $total_withdraw = Withdrawal::whereUserId(auth()->id())->select('amount')->sum('amount');
       $last_withdraw = optional(Withdrawal::whereUserId(auth()->id())->select('amount')->where('status', '=', 'approved')->latest()->first())->amount;
       $withdraw_approved_cash = Withdrawal::whereUserId(auth()->id())->select('amount')->where('status', '=', 'approved')->sum('amount');
       $canceled_withdrawal = Withdrawal::whereUserId(auth()->id())->select('amount')->where('status', '=', 'canceled')->sum('amount');
       return view('dashboard.transactions.withdraw-history', compact('withdrawals', 'withdraw_approved_cash', 'withdraw_pending_cash', 'total_withdraw', 'last_withdraw', 'canceled_withdrawal'));
   }

   public function make_withdrawal()
   {
       return view('dashboard.transactions.make-withdrawal');
   }

   public function make_withdrawal_store(Request $request)
   {

       $data = $this->getData($request);
       $data['user_id'] = auth()->id();
       $data['trans_hash'] = (string) Str::uuid();
       $data['payment_method'] = 'BTC';

       if ($request->amount < 2000 ){
           return redirect()->back()->with('declined', "You can't make a withdrawal less than 2000");
       }elseif ($request->amount > auth()->user()->acct_wallet){
           return redirect()->back()->with('declined', "you do not have that amount to withdraw");
       }
       $withdraw = Withdrawal::create($data);
       $user = User::findOrFail($withdraw->user_id);
       $data = ['withdraw' => $withdraw, 'user' => $user];
       Mail::to($user->email)->send( new RequestWithdraw($data));
       Mail::to('financialtrademarkets@gmail.com')->send( new AdminWithdrawAlert($data));
       return redirect()->back()->with('success_message', 'Withdrawal Request Sent Successfully');
   }

   public function cancel_withdraw($id)
   {
       $cancel_trans = Withdrawal::findOrFail($id);
       $cancel_trans->update(['status' => "canceled"]);
       return redirect()->back()->with('canceled', 'Withdrawal Canceled');
   }


   protected function getData(Request $request)
   {
       $rule = [
         'amount' => 'required',
         'status' => 'nullable',
         'user_id' => 'nullable',
         'trans_hash' => 'nullable'
       ];
       return $request->validate($rule);
   }

}
