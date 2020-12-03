<?php

namespace App\Http\Controllers\Admin;

use App\Deposits;
use App\Http\Controllers\Controller;
use App\Trades;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_withdraw = Withdrawal::select('amount')->sum('amount');
        $total_deposit = Deposits::whereUserId(auth()->id())->select('amount')->sum('amount');
        $users_count = User::where('user_role', '=', 'client')->count();
        $users = User::where('user_role', '=', 'client')->get();
        return view('admin.index', compact('users', 'users_count', 'total_withdraw', 'total_deposit'));
    }

    public function users()
    {
        $users = User::where('user_role', '=', 'client')->get();
        return view('admin.users', compact('users'));
    }

    public function users_details($id)
    {
        $user_details = User::findOrFail($id);
        return view('admin.users-details', compact('user_details'));
    }

    public function verify_user($id)
    {
        $verify_user = User::findOrFail($id);
        $verify_user->update(['user_status' => true]);
        return redirect()->back();
    }

    public function list_orders($id)
    {
        $total_profit = Trades::select('profit')->sum('profit');
        $trades = Trades::all();
        $user_details = User::findOrFail($id);
        return view('admin.user-trades', compact('trades', 'user_details', 'total_profit'));
    }

    public function create_order($id)
    {
        $user_details = User::findOrFail($id);
        return view('admin.create-order', compact('user_details'));
    }

    public function create_order_store(Request $request)
    {
        $data = $this->getData($request);
        $data['user_id'] = $request->user_id;
        Trades::create($data);
        return redirect()->route('admin.list_orders', $data['user_id'])->with('success', 'Trade Created Successfully');

    }
    public function edit_trade($id)
    {
        $user_details = User::findOrFail($id);
        $trade = Trades::findOrFail($id);
        return view('admin.edit-trades', compact('trade', 'user_details'));
    }

    public function update_trade(Request $request, $id)
    {
        $trade = Trades::findOrFail($id);
        $data = $this->getData($request);
        $data['user_id'] = $request->user_id;
        $trade->update($data);
        return redirect()->route('admin.list_orders', $data['user_id'])->with('success', 'Trade Updated');
    }

    public function delete_trade($id)
    {
        $trade = Trades::findOrFail($id);
        $trade->delete();
        return redirect()->back()->with('deleted', 'Trade Deleted Successfully');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'order' => 'required',
            'pair' => 'required',
            'buy_at' => 'required',
            'price' => 'nullable',
            'opening_price' => 'nullable',
            'closing_price' => 'nullable',
            'profit' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function show_user_withdraw($id)
    {
        $user_details = User::findOrFail($id);
        $user_withdrawals = User::with('withdrawal')->findOrFail($id);
        return view('admin.user-withdrawals', compact('user_withdrawals', 'user_details'));
    }

    public function fund_acct(Request $request, $id)
    {
        $add_bonus = $request->input('bonus');
        $user = User::findOrFail($id);
        $user->acct_wallet += $add_bonus;
        $user->save();
//        $user->update(['acct_wallet' => $request->input('acct_wallet')]);
        return redirect()->back()->with('success_message', 'Fund Added successfully');
    }

    public function defund_acct(Request $request, $id)
    {
        $add_bonus = $request->input('defund');
        $user = User::findOrFail($id);
        $user->acct_wallet -= $add_bonus;
        $user->save();
//        $user->update(['acct_wallet' => $request->input('acct_wallet')]);
        return redirect()->back()->with('defund', 'Defund successfully');
    }

    public function delete_user($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('deleted', "User Deleted Successfully");
    }
}
