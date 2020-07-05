<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class CustomerController extends Controller
{
    // Customer Logout
    public function customerLogout(){
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
     public function verifyEmail(){
         return view('auth.verify');
     }

}
