<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

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
        if($request->payment == 'mastercard') {
            $cartList = Cart::content();
           return view('layouts.payment.strip_payment', compact('cartList', 'payment'));
        } elseif($request->payment == 'paypal') {
            dd('papal payment');
        } elseif($request->payment == 'ideal') {
            dd('ideal payment');
        } else{
            dd('checking');
        }
    }
    // Stripe Chager Method... 
    public function stripeCharge(Request $request)
    {
     // Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_51H6KoSHPevkCFYETCg7crsKZ5zE9kFlE3rImkQJ7dLPktnKM2o7GA5sY15acvRYxE5rQOT4rmPhYOUhmVIQILLbN00SmYAoI9y');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

$charge = \Stripe\Charge::create([
  'amount' => 999*100,
  'currency' => 'usd',
  'description' => 'LWA PAYMENT',
  'source' => $token,
  'metadata' => ['order_id' => '6735'],
]);
   dd($charge);
    }
}

