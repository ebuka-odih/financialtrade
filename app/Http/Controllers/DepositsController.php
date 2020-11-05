<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use Illuminate\Http\Request;
use Hexters\CoinPayment\Helpers\CoinPaymentFacade as CoinPayment;
use Kevupton\LaravelCoinpayments\Exceptions\IpnIncompleteException;

class DepositsController extends Controller
{

    public function deposit_history()
    {
        return view('dashboard.transactions.deposit-history');
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

    public function process_deposit(Request $request)
    {
        $invest_plan = InvestPlans::findOrFail($request->plan_id);
        $transaction['amountTotal'] = (FLOAT) $request->amount;
        $transaction['note'] = $request->name;
        $transaction['buyer_email'] = auth()->user()->email;
        $transaction['redirect_url'] = route('user.deposit_history');

        /*
        *   @required true
        *   @example first item
        */

        if ($request->amount < $invest_plan->min_amount || $request->amount > $invest_plan->max_amount){
            return redirect()->back()->with('declined', 'Enter the exact min amount or max amount');
        }
        $transaction['items'][] = [
            'itemDescription' => $request->name,
            'itemPrice' => (FLOAT) $request->amount, // USD
            'itemQty' => (INT) 1,
            'itemSubtotalAmount' => (FLOAT) $request->amount// USD
        ];

        $link =CoinPayment::generatelink($transaction);

        return redirect($link);
    }

    public function validateIpn (Request $request)
    {
        try {

            $ipn = \Coinpayments::validateIPNRequest($request);

            // if the ipn came from the API side of coinpayments merchant
            if ($ipn->isApi()) {

                /*
                 * If it makes it into here then the payment is complete.
                 * So do whatever you want once the completed
                 */

                // do something here
                // Payment::find($ipn->txn_id);
            }
        }
        catch (IpnIncompleteException $e) {
            $ipn = $e->getIpn();
            /*
             * Can do something here with the IPN model if desired.
             */
        }
    }


}
