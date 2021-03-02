<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Hexters\CoinPayment\Helpers\CoinPaymentFacade as CoinPayment;
//use Kevupton\LaravelCoinpayments\Exceptions\IpnIncompleteException;
use App\Deposits;
//use Kevupton\LaravelCoinpayments\Models\Deposit;

class DepositsController extends Controller
{

    public function deposit_history()
    {
        $deposits = Deposits::whereUserId(auth()->id())->get();

        $deposit_pending_cash = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '=', 'pending')->sum('amount');
        $total_deposit = Deposits::whereUserId(auth()->id())->select('amount')->sum('amount');
        $last_deposit = optional(Deposits::whereUserId(auth()->id())->select('amount')->latest()->first())->amount;
        $deposit_approved_cash = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '=', 'approved')->sum('amount');
        $canceled_deposit = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '<', 0)->sum('amount');
        return view('dashboard.transactions.deposit-history', compact('deposits', 'deposit_approved_cash', 'deposit_pending_cash', 'total_deposit', 'last_deposit', 'canceled_deposit'));
    }
    //
    public function pick_plan()
    {
        $invest_plans = InvestPlans::all();
        return view('dashboard.transactions.deposit', compact('invest_plans'));
    }

    public function make_deposit($id)
    {
        $invest_plan = InvestPlans::findOrFail($id);
        return view('dashboard.transactions.make-deposit', compact('invest_plan'));
    }

    public function process_deposit2(Request $request)
    {
        $invest_plan = InvestPlans::findOrFail($request->plan_id);
        if ($request->amount < $invest_plan->min_amount || $request->amount > $invest_plan->max_amount){
            return redirect()->back()->with('declined', "Enter the exact min amount or max amount");
        }else {
            $deposit = new Deposits();
            $deposit->amount = $request->input('amount');
            $deposit->user_id = auth()->id();
            $deposit->invest_plans_id = $request->plan_id;
            $deposit->save();
            return redirect()->route('user.deposit_details', $deposit->id);
        }

    }



//    public function process_deposit(Request $request)
//    {
//        $invest_plan = InvestPlans::findOrFail($request->plan_id);
//        $transaction['amountTotal'] = (FLOAT) $request->amount;
//        $transaction['note'] = $request->name;
//        $transaction['buyer_email'] = auth()->user()->email;
//        $transaction['redirect_url'] = route('user.deposit_history');
//
//        /*
//        *   @required true
//        *   @example first item
//        */
//
//        if ($request->amount < $invest_plan->min_amount || $request->amount > $invest_plan->max_amount){
//            return redirect()->back()->with('declined', 'Enter the exact min amount or max amount');
//        }
//        $transaction['items'][] = [
//            'itemDescription' => $request->name,
//            'itemPrice' => (FLOAT) $request->amount, // USD
//            'itemQty' => (INT) 1,
//            'itemSubtotalAmount' => (FLOAT) $request->amount// USD
//        ];
//
//        $d_data = ['amount' => $request['amount'],'status'=>'pending','invest_plans_id'=>$request['plan_id'],'user_id'=>auth()->id()];
//
//        $request->session()->put('d_data',$d_data);
//
//        $link = CoinPayment::generatelink($transaction);
//
//        return redirect($link);
//    }


    public function deposit_details($id){

        $p_deposit = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '=', 0)->sum('amount');
        $t_deposit = Deposits::whereUserId(auth()->id())->select('amount')->sum('amount');
        $l_deposit = optional(Deposits::whereUserId(auth()->id())->select('amount')->latest()->first())->amount;
        $a_deposit = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '>=', 100)->sum('amount');
        $c_deposit = Deposits::whereUserId(auth()->id())->select('amount')->where('status', '<', 0)->sum('amount');


        $deposit_detail = Deposits::whereUserId(auth()->id())->findOrFail($id);

        $investment_plan = InvestPlans::findOrFail($deposit_detail->invest_plans_id);
        $user = User::findOrFail($deposit_detail->user_id);

        $expected_percent = $investment_plan->daily_interest  * $deposit_detail->amount;
        $profit_percent =  number_format((float)$expected_percent / 100, 2, '.', '');

        $days = 1;

        $current_date = Carbon::now();
        $d_approved = Carbon::parse($deposit_detail->approved_date);
        $d_ended = Carbon::parse($deposit_detail->end_date);

        if($d_approved->diffInDays($current_date) < $investment_plan->term_days){
            $days = $d_approved->diffInDays($current_date);
        }else {
            $days =  $investment_plan->term_days;
        }

        $i = 1;
        while ($i < $days){
            $i++;
        }

        return view('dashboard.transactions.deposit-details', compact('deposit_detail', 'investment_plan', 'days', 'i',
        'p_deposit', 't_deposit', 'a_deposit', 'l_deposit', 'c_deposit'));
    }

    public function payment_proof(Request $request)
    {
        $id = $request->payment_proof_id;
        if ($request->hasFile('payment_proof')) {
            $fileNameWithExt = $request->file('payment_proof')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store the image
            $path = $request->file('payment_proof')->storeAs('public/payment-proof/', $fileNameToStore);
        }else {
            $fileNameToStore = 'Noimage';
        }

        $payment_image = Deposits::findOrfail($id);
        if($fileNameToStore){
            $payment_image->update(['payment_proof' => $fileNameToStore]);
        }
        return redirect()->back()->with('success_message', 'Submitted, Proof of Payment awaiting confirmation');
    }

    public function delete_deposit($id)
    {
        $deposit = Deposits::findOrFail($id);
        $deposit->delete();
        return redirect()->back()->with('deleted', "Deposit Deleted Successfully");
    }




}
