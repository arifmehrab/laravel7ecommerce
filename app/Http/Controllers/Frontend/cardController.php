<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\product;
use Cart;
use Illuminate\Http\Request;

class cardController extends Controller
{
    // Add To Card..
    public function addToCard(Request $request)
    {
        $product_id = $request->product_id;
        $product    = product::where('id', $product_id)->where('status', 1)->first();
        // Card Add
        if ($product->discount_price == null) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = 1;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);
            // json
            return response()->json(['success' => 'Cart Added Successfully']);
        } else {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = 1;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            Cart::add($data);
            // json
            return response()->json(['success' => 'cart Added Successfully']);
        }
    }
    // Cart Check
    public function cartCheck()
    {
        $checkCart = Cart::content();
        dd($checkCart->toArray());
    }
    // Add Product Cart By Route..
    public function addProductCard(Request $request, $id)
    {
        $product = product::where('id', $id)->where('status', 1)->first();
        // Card Add
        if ($product->discount_price == null) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);
            // Notification...
            $notification = array(
                'message'    => 'Cart added successfuly',
                'alert-type' => 'success',
            );
            // Redirect
            return redirect()->to('/')->with($notification);
        } else {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $request->qty;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size']  = $request->size;
            Cart::add($data);
            // Notification...
            $notification = array(
                'message'    => 'Cart added successfuly',
                'alert-type' => 'success',
            );
            //Redirect
            return redirect()->to('/')->with($notification);
        }

    }
    // Cart Product Lists..
    public function cartProductList()
    {
        $cartList = Cart::content();
        return view('layouts.pages.cart_product_list', compact('cartList'));
    }
    // Cart Product Remove..
    public function cartProductRemove($rowId)
    {
        Cart::remove($rowId);
        // Notification...
        $notification = array(
          'message'    => 'Cart remove successfuly',
          'alert-type' => 'success',
         );
        return redirect()->back()->with($notification);
    }
    // Cart Product Update..
    public function cartProductUpdate(Request $request, $id)
    {
      $rowId = $id;
      $qty = $request->qty;
      Cart::update($rowId, $qty);
       // Notification...
       $notification = array(
        'message'    => 'Cart Update successfuly',
        'alert-type' => 'success',
       );
      return redirect()->back()->with($notification);
    }
}
