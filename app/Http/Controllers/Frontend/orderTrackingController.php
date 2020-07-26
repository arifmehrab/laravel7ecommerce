<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\order;
class orderTrackingController extends Controller
{
    // Order Tracking 
    public function orderTracking(Request $request)
    {
        // validation
        $request->validate([
          'track' => 'required'
        ]);
       $order = $request->track;
       $tracking = order::where('status_code', $order)->first();
       if($tracking){
         return view('layouts.pages.order_tracking', compact('tracking'));
       } else{
        // Notification...
        $notification = array(
            'message'    => 'Invalid Tracking Number',
            'alert-type' => 'error',
        );
        // Redirect
        return redirect()->back()->with($notification);
       }
    }
}
