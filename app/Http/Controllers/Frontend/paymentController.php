<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\order;
use App\Models\Frontend\order_detail;
use App\Models\Frontend\shipping;
use Auth;
use Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Session;

class paymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Payment page..
    public function paymentPage()
    {
        $cartList = Cart::content();
        return view('layouts.pages.payment_page', compact('cartList'));
    }
    // Payment Process..
    public function paymentProcess(Request $request)
    {
        // Validation
        $validation = $request->validate([
            'name'         => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required',
            'address'      => 'required',
            'city'         => 'required',
            'post_code'    => 'required',
            'payment'      => 'required',
        ]);
        $payment                 = array();
        $payment['name']         = $request->name;
        $payment['email']        = $request->email;
        $payment['phone_number'] = $request->phone_number;
        $payment['address']      = $request->address;
        $payment['city']         = $request->city;
        $payment['post_code']    = $request->post_code;
        $payment['payment']      = $request->payment;
        // payment conditions..
        if ($request->payment == 'mastercard') {
            $cartList = Cart::content();
            return view('layouts.payment.strip_payment', compact('cartList', 'payment'));
        } elseif ($request->payment == 'paypal') {
            dd('papal payment');
        } elseif ($request->payment == 'ideal') {
            dd('ideal payment');
        } else {
            dd('checking');
        }
    }
    // Stripe Chager Method...
    public function stripeCharge(Request $request)
    {
        // User Payment Conditin..
        if (Session::has('coupon')) {
            $chargAmount = Session::get('coupon')['amount'] + $request->shipping;
        } else {
            $chargAmount = $request->cartTotal;
        }
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51H6KoSHPevkCFYETCg7crsKZ5zE9kFlE3rImkQJ7dLPktnKM2o7GA5sY15acvRYxE5rQOT4rmPhYOUhmVIQILLbN00SmYAoI9y');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount'      => $chargAmount * 100,
            'currency'    => 'usd',
            'description' => 'LWA PAYMENT',
            'source'      => $token,
            'metadata'    => ['order_id' => Str::random(20)],
        ]);
        // Insert Order Information..
        $order                   = new order();
        $order->user_id          = Auth::id();
        $order->payment_type     = $request->payment_type;
        $order->payment_id       = $charge->payment_method;
        $order->payment_amount   = $charge->amount;
        $order->blnc_transection = $charge->balance_transaction;
        $order->strip_order_id   = $charge->metadata->order_id;
        // subtotal
        if (Session::has('coupon')) {
            $order->subtotal = Session::get('coupon')['amount'];
        } else {
            $str             = Cart::Subtotal();
            $cartTotal       = str_replace(',', '', $str);
            $order->subtotal = $cartTotal;
        }
        $order->shipping = $request->shipping;
        // Total
        if (Session::has('coupon')) {
            $tAmount      = Session::get('coupon')['amount'] + $request->shipping;
            $order->total = $tAmount;
        } else {
            $order->total = $request->cartTotal;
        }
        $order->status      = '0';
        $order->month       = date('m');
        $order->status_code = Str::random(7);
        $order->date        = date('d-m-Y');
        $order->year        = date('Y');
        // DB Transction Here..
        DB::transaction(function () use ($request, $order) {
            if ($order->save()) {
                // Insert Shipping Details..
                $shipping                 = new shipping();
                $shipping->order_id       = $order->id;
                $shipping->ship_name      = $request->ship_name;
                $shipping->ship_email     = $request->ship_email;
                $shipping->ship_phone     = $request->ship_phone;
                $shipping->ship_address   = $request->ship_address;
                $shipping->ship_city      = $request->ship_city;
                $shipping->ship_post_code = $request->ship_post_code;
                $shipping->save();
                // Insert Orders Details..
                $cartContent = Cart::content();
                foreach ($cartContent as $row) {
                    $orderDetais               = new order_detail();
                    $orderDetais->order_id     = $order->id;
                    $orderDetais->product_id   = $row->id;
                    $orderDetais->product_name = $row->name;
                    $orderDetais->color        = $row->options->color;
                    $orderDetais->size         = $row->options->size;
                    $orderDetais->qty          = $row->qty;
                    $orderDetais->single_price = $row->price;
                    $orderDetais->total_price  = $row->price * $row->qty;
                    $orderDetais->save();
                }
            }
        });
        // Forget Existing Data..
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        // Notification
        $notification = array(
            'message'    => 'Order Successfull',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->to('/')->with($notification);

    } // End Method //
}
