<?php

namespace App\Http\Controllers\Admin\Auth;

use App\admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Hash;
class ProfileController extends Controller
{
    public function index()
    {
        $admin = admin::find(Auth::id());
        return view('Admin.auth.admin_profile', compact('admin'));
    }
    // Profile Update //

    public function profileUpdate(Request $request)
    {

        // validation
        $validation = $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg',
        ]);

        // update profile
        $adminProfile = admin::find(Auth::id());

        // image
        if ($request->file('image')) {
            $image = $request->file('image');
            @unlink(public_path('/Backend/assets/images/profile/' . $userProfile->profile));
            $imageName = date('d-m-Y') . '.' . uniqid() . '.' . $image->getClientOriginalName();
            $imagePath = public_path('/Backend/assets/images/profile/');
            $image->move($imagePath, $imageName);
            $adminProfile->profile = $imageName;
        }
        // update
        $adminProfile->name  = $request->name;
        $adminProfile->email = $request->email;
        $adminProfile->phone = $request->phone;
        $adminProfile->save();

        // Redirect
        return redirect()->back()->with('success', 'Your Profile Updated SuccessFully');
    }
    // Password Update
    public function passwordUpdate(Request $request)
    {
       // validation
       $validation = $request->validate([
        'current_password' => 'required',
        'password'         => 'required',
    ]);
    if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password]))
    {
        // validation
        $validation = $request->validate([
            'password' => 'required|confirmed'
        ]);
        // update
        $changePass           = admin::find(Auth::user()->id);
        $changePass->password = Hash::make($request->password);
        $changePass->save();
        // logout
        Auth::logout();
        // Redirect
        return redirect('/admin')->with('success', 'Your Password Update Successfully');

    } else {
        return redirect()->back()->with('error', 'Your Current Password Not Match');
    }
    }
}
