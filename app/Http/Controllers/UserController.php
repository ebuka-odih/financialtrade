<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function personal_info()
    {
        $user = Auth::user();
        return view('dashboard.personal_info', compact('user'));
    }

    public function personal_info_store(Request $request)
    {
        $users = User::findOrFail(auth()->id());
         $users->update($request->all());
        return redirect()->back()->with('success', 'Personal Info updated successfully');
    }

    public function kyc_verification()
    {
        return view('dashboard.kyc_verification');
    }


}
