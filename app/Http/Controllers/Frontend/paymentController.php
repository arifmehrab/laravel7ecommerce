<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
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
        return $request->payment;
    }
}
