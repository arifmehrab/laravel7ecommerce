<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\coupon;
use App\Models\Admin\product;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Session;

class cardController extends Controller
{
    // Add To Card By Ajax..
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
        $coupon = Session::get('coupon')['name'];
        $rowId = $id;
        $qty   = $request->qty;
        Cart::update($rowId, $qty);
        // Coupon Update.. 
        $couponCheck = coupon::where('coupon', $coupon)->first();
        if ($couponCheck) {
            session::put('coupon', [
                'name'     => $couponCheck->coupon,
                'discount' => $couponCheck->discount,
                'amount'   => Cart::Subtotal() - $couponCheck->discount,
            ]);
        }
        // Notification...
        $notification = array(
            'message'    => 'Cart Update successfuly',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    // Cart Product Insert..
    public function productCartInsert(Request $request)
    {
        $product_id = $request->product_id;
        $color      = $request->color;
        $size       = $request->size;
        $qty        = $request->qty;
        $product    = product::where('id', $product_id)->where('status', 1)->first();
        // Card Add
        if ($product->discount_price == null) {
            $data                     = array();
            $data['id']               = $product->id;
            $data['name']             = $product->product_name;
            $data['qty']              = $qty;
            $data['price']            = $product->selling_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $color;
            $data['options']['size']  = $size;
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
            $data['qty']              = $qty;
            $data['price']            = $product->discount_price;
            $data['weight']           = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $color;
            $data['options']['size']  = $size;
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
    public function userCheckout()
    {
        if (Auth::check()) {
            $cartList = Cart::content();
            return view('layouts.pages.user_checkout', compact('cartList'));
        } else {
            // Notification...
            $notification = array(
                'message'    => 'You Need To Login First',
                'alert-type' => 'error',
            );
            return redirect('/login')->with($notification);
        }
    }
    // User Coupon Apply..
    public function userCoupon(Request $request)
    {
        $coupon      = $request->coupon;
        $couponCheck = coupon::where('coupon', $coupon)->first();
        if ($couponCheck) {
            session::put('coupon', [
                'name'     => $couponCheck->coupon,
                'discount' => $couponCheck->discount,
                'amount'   => Cart::Subtotal() - $couponCheck->discount,
            ]);
            // Notification...
            $notification = array(
                'message'    => 'Coupon Applied Successfully',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            // Notification...
            $notification = array(
                'message'    => 'Sorry! The Coupon Code is already expired',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    // Coupon Remove... 
    public function userCouponRemove()
    {
        session()->forget('coupon');
        return redirect()->back();
    }
}
