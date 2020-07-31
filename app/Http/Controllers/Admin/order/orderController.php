<?php

namespace App\Http\Controllers\Admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\order;
use App\Models\Frontend\shipping;
use App\Models\Frontend\order_detail;
class orderController extends Controller
{
    // Pending Order.. 
    public function pendingOrder()
    {
       $pendingOrders = order::where('status', 0)->orderBy('id','ASC')->get();
       return view('Admin.order.pending_order', compact('pendingOrders'));
    }
    // order View.. 
    public function orderView($id)
    {
       $order = order::where('id', $id)->first();
       $shipping = shipping::where('order_id', $id)->first();
       $order_details = order_detail::where('order_id', $id)->get();
       return view('Admin.order.order_details', compact('order', 'shipping', 'order_details'));

    }
    // order Accept.. 
    public function orderAccept($id)
    {
       $orderAccept = order::find($id);
       $orderAccept->status = 1;
       $orderAccept->save();
       $notification = array(
         'message'    => 'Order Approved Successfully',
         'alert-type' => 'success',
     );
     // Redirect
     return redirect()->route('admin.pending.order')->with($notification);
    }
    // Order Prograss.. 
    public function orderPrograssStatus($id)
    {
      $orderPrograss = order::find($id);
      $orderPrograss->status = 2;
      $orderPrograss->save();
      $notification = array(
        'message'    => 'Order Prograss Successfully',
         'alert-type' => 'success',
      );
      // Redirect
      return redirect()->route('admin.order.prograss')->with($notification);
    }
    // Order Delievered.. 
    public function orderDeliveredStatus($id)
    {
      $orderPrograss = order::find($id);
      $orderPrograss->status = 3;
      $orderPrograss->save();
      $notification = array(
        'message'    => 'Order Delievered Successfully',
         'alert-type' => 'success',
      );
      // Redirect
      return redirect()->route('admin.order.delivered')->with($notification);
    }
    // order Cancle.. 
    public function orderCancle($id)
    {
      $orderCancle = order::find($id);
       $orderCancle->status = 4;
       $orderCancle->save();
       $notification = array(
         'message'    => 'Order Cancle Successfully',
         'alert-type' => 'success',
     );
     // Redirect
     return redirect()->route('admin.pending.order')->with($notification);
    }
    // Payment accept.. 
    public function orderPaymentAccept()
    {
      $pendingOrders = order::where('status', 1)->orderBy('id','DESC')->get();
      return view('Admin.order.pending_order', compact('pendingOrders'));
    }
     // Payment Prograss Order.. 
     public function orderPrograss()
     {
       $pendingOrders = order::where('status', 2)->orderBy('id','DESC')->get();
       return view('Admin.order.pending_order', compact('pendingOrders'));
     }
     // Payment Delivered orders..  
     public function orderDelivered()
     {
       $pendingOrders = order::where('status', 3)->orderBy('id','DESC')->get();
       return view('Admin.order.pending_order', compact('pendingOrders'));
     }
      // orders Cancled..  
      public function orderCancled()
      {
        $pendingOrders = order::where('status', 4)->orderBy('id','DESC')->get();
        return view('Admin.order.pending_order', compact('pendingOrders'));
      }
      // Return Order List.. 
      public function adminReturnOrderList()
      {
        $orderLists = order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('Admin.order.return_order_list', compact('orderLists'));
      }
      // Return Order request.. 
      public function adminReturnOrderRequest()
      {
        $returnOrders = order::where('return_order', 1)->get();
        return view('Admin.order.return_order', compact('returnOrders'));
      }
      public function returnOrderApproved($id)
      {
         $orderApproved = order::find($id);
         $orderApproved->return_order = 2;
         $orderApproved->save();
         // Notification
         $notification = array(
           'message'    => 'Order Return Successfully Approved!',
           'alert-type' => 'success',
         );
       // Redirect
       return redirect()->back()->with($notification);

      }

}
