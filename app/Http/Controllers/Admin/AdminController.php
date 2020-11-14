<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Trades;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_withdraw = Withdrawal::select('amount')->sum('amount');
        $users_count = User::where('user_role', '=', 'client')->count();
        $users = User::where('user_role', '=', 'client')->get();
        return view('admin.index', compact('users', 'users_count', 'total_withdraw'));
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
        $trades = Trades::all();
        $user_details = User::findOrFail($id);
        return view('admin.user-trades', compact('trades', 'user_details'));
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
        return redirect()->route('admin.list_orders', $data['user_id'])->with('success', 'Order Created Successfully');

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
        ];
        return $request->validate($rules);
    }

    public function show_user_withdraw($id)
    {
        $user_details = User::findOrFail($id);
        $user_withdrawals = User::with('withdrawal')->findOrFail($id);
        return view('admin.user-withdrawals', compact('user_withdrawals', 'user_details'));
    }

}
