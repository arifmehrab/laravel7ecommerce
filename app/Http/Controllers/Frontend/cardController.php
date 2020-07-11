<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\product;
use Illuminate\Http\Request;
use Cart;
class cardController extends Controller
{
    // Add To Card..
    public function addToCard(Request $request)
    {
        $product_id = $request->product_id;
        $product    = product::where('id', $product_id)->where('status', 1)->first();
        // Card Add
       if($product->discount_price == NULL) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $product->product_quantity;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);
            // json
            return response()->json(['success'=> 'Cart Added Successfully']);
       } else{
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $product->product_quantity;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);
            // json
            return response()->json(['success'=> 'cart Added Successfully']);
       }
    }
    // Cart Check 
    public function cartCheck(){
        $checkCart = Cart::content();
        dd($checkCart->toArray());
    }
}
