<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\order;
use Auth;
class returnOrderController extends Controller
{
    // User Return Order list
    public function returnOrderList()
    {
        $user = Auth::id();
        $orderList = order::where('user_id', $user)->get();
        return view('layouts.customer.return_order_list', compact('orderList'));
    }
    // User Return Order Request
    public function returnOrderRequest($id)
    {
        $orderRequest = order::find($id);
        $orderRequest->return_order = 1;
        $orderRequest->save();
        // Notification
        $notification = array(
            'message'    => 'Order Return Successfully! We Notify You soon As An Return Order. Thanks',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->back()->with($notification);

    }
}
