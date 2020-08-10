<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\contact_message;
use App\Models\Admin\setting;
use Illuminate\Http\Request;

class contactController extends Controller
{
    // Contact Page
    public function contact()
    {
        $setting = setting::first();
        return view('layouts.pages.contact_page', compact('setting'));
    }

    // message stooree
    public function contactStore(Request $request)
     {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        // store
        $contactMessage = new contact_message();
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->phone = $request->phone;
        $contactMessage->message = $request->message;
        $contactMessage->save();
         // Notification
         $notification = array(
            'message'    => 'Message Send Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->back()->with($notification);
     }
}
