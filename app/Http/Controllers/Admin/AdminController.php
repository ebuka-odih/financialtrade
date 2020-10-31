<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users_count = User::where('user_role', '=', 'client')->count();
        $users = User::where('user_role', '=', 'client')->get();
        return view('admin.index', compact('users', 'users_count'));
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
}
