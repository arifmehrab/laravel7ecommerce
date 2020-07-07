<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
}
