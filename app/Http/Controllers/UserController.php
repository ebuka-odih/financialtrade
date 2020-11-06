<?php

namespace App\Http\Controllers;

use App\InvestPlans;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function personal_info()
    {
        $user = Auth::user();
        return view('dashboard.user-settings.personal_info', compact('user'));
    }

    public function personal_info_store(Request $request)
    {
        $users = User::findOrFail(auth()->id());
         $users->update($request->all());
        return redirect()->back()->with('success', 'Personal Info updated successfully');
    }

    public function kyc_verification()
    {
        return view('dashboard.user-settings.kyc_verification');
    }
    public function kyc_store(Request $request)
    {
        if ($request->hasFile('id_image_1')) {
            $fileNameWithExt = $request->file('id_image_1')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('id_image_1')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store the image
            $path = $request->file('id_image_1')->storeAs('public/id_images/', $fileNameToStore);
        }else {
            $fileNameToStore = ' Noimage';
        }

        $user_id_type = User::findOrFail(auth()->id());
        if($fileNameToStore){
            $user_id_type->update(['id_type' => $request->id_type, 'id_image_1' => $fileNameToStore]);
        }
        return redirect()->back()->with('success', 'ID submitted successfully, wait for approval');
    }

    public function profile_details()
    {
        $users_details = User::findOrFail(auth()->id());
        return view('dashboard.user-settings.profile_details', compact('users_details'));
    }



    public function profile_picture_store(Request $request)
    {

        if ($request->hasFile('profile_image')) {
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store the image
            $path = $request->file('profile_image')->storeAs('public/profile_images/', $fileNameToStore);
        }else {
            $fileNameToStore = ' Noimage';
        }
        $user_profile_pic = User::findOrFail(auth()->id());
        if($fileNameToStore) {
            $user_profile_pic->update(['profile_image' => $fileNameToStore]);
        }
        return redirect()->back()->with('success', 'Profile Image Changed Successfully');
    }



    public function change_password()
    {
        return view('dashboard.user-settings.change-password');
    }

    public function change_password_store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

       return redirect()->back()->with('success', 'Password Changed Successfully');
    }


}
