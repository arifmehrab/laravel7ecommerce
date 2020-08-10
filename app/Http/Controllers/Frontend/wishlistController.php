<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\subscriber;
use Illuminate\Http\Request;
use App\Models\Frontend\wishlist;
use Auth;
class wishlistController extends Controller
{
    // wishlist
    public function wishlist(Request $request){
       $userId = Auth::id();
       $productId = $request->product_id;
       if(Auth::check()) {
           // Current wishlist check
         $checkList = wishlist::where('user_id', $userId)->where('product_id', $productId)->first();
          // logic
         if($checkList) {
           // json
           return response()->json(['error'=> 'This Produt Already Has your wishlist']);
         } else {
             // Add Wishlist
             $wishlistAdded = new wishlist();
             $wishlistAdded->user_id = $userId;
             $wishlistAdded->product_id = $productId;
             $wishlistAdded->save();
             // json
             return response()->json(['success'=> 'Wishlist Added Successfully']);
         }
       } else{
         // json
         return response()->json(['error'=> 'Your Need To Login First']);
       }
    }
    // Customer All Wishlist View... 
    public function wishlistView(){
      $user = Auth::id();
      $wishlistView = wishlist::where('user_id', $user)->get();
      return view('layouts.pages.wishlist_view', compact('wishlistView'));
    } 
    // Subscriber store
    public function subscriberStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $subscriber = new subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
         // Notification
         $notification = array(
            'message'    => 'Subscribe Done',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->back()->with($notification);

    }  
}
