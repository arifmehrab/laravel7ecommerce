<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Hash;
use App\Models\Frontend\order;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Customer Dashboard
    public function customerDashboard()
    {
        $user = Auth::id();
        $orders = order::where('user_id', $user)->get();
        return view('layouts.customer.customer_dashboard', compact('orders'));
    }
    // Customer Logout
    public function customerLogout()
    {
        // logout
        Auth::logout();
        // Notification
        $notification = array(
            'message'    => 'Successfully Logout',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('login')->with($notification);
    }

    // Customer email verify blad
    public function verifyEmail()
    {
        return view('auth.verify');
    }

    // Customer Profile Edit
    public function CustomerProfileEdit()
    {
        $user = User::find(Auth::user()->id);
        return view('layouts.customer.customer_profile_edit', compact('user'));
    }
    // Customer Profile Update //

    public function customerProfileUpdate(Request $request)
    {

        //validation
        $validation = $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'profile' => 'mimes:jpg,png,jpeg',
        ]);

        // update profile
        $customerProfile = User::find(Auth::user()->id);

        // image
        if ($request->file('profile')) {
            $image = $request->file('profile');
            @unlink(public_path('/Frontend/images/profile/' . $customerProfile->profile));
            $imageName = date('d-m-Y') . '.' . uniqid() . '.' . $image->getClientOriginalName();
            $imagePath = public_path('/Frontend/images/profile/');
            $image->move($imagePath, $imageName);
            $customerProfile->profile = $imageName;
        }
        // update
        $customerProfile->name         = $request->name;
        $customerProfile->email        = $request->email;
        $customerProfile->phone_number = $request->phone_number;
        $customerProfile->save();
        // Notification
        $notification = array(
            'message'    => 'Profile Updated successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('customer.dashboard')->with($notification);
    }
    // Customer Password Edit
    public function customerPasswordChange(){
        $user = User::find(Auth::user()->id);
        return view('layouts.customer.customer_password_update', compact('user'));
    }
    // customer password update 
    public function customerPasswordUpdate(Request $request){
         // validation
         $validation = $request->validate([
            'current_password' => 'required',
            'password'         => 'required',
            ]);
        // Password check
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            // Validation
             $validation = $request->validate([
            'password' => 'required|confirmed'
            ]);
           // Password Update
           $changePass = User::find(Auth::user()->id);
           $changePass->password = Hash::make($request->password);
           $changePass->save();
           // Notification
           $notification = array(
            'message'    => 'Password Updated successfuly',
            'alert-type' => 'success',
        );
        Auth::logout();
        // Redirect
        return redirect()->route('login')->with($notification);
        } else{
          // Notification
           $notification = array(
            'message'    => 'Your Current Password Not Match Please Try Again',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
        }
    }

}
