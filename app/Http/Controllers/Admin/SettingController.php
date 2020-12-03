<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{


    public function create()
    {
        return view('admin.add-settings');
    }
    public function store(Request $request){
        setting($request->except('_token'))->save();
        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function qr_code(Request $request)
    {
        if ($request->hasFile('qrcode')) {
            $fileNameWithExt = $request->file('qrcode')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('qrcode')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //store the image
            $path = $request->file('qrcode')->storeAs('public/qrcode/', $fileNameToStore);
        } else {
            $fileNameToStore = ' Noimage';
        }

        if($fileNameToStore){
            setting($request->except('_token'))->save();
        }
        return redirect()->back();

    }


}
