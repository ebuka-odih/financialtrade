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

        $user_id_type = User::findOrfail(auth()->id());
        if($fileNameToStore){
            $user_id_type->update(['id_type' => $request->id_type, 'id_image_1' => $fileNameToStore]);
        }
        return redirect()->back()->with('success', 'ID submitted successfully, wait for approval');
    }


}
