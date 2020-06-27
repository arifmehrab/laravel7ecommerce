<?php

namespace App\Http\Controllers\Admin\coupon;

use App\Http\Controllers\Controller;
use App\Models\Admin\coupon;
use Illuminate\Http\Request;

class couponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = coupon::latest()->get();
        return view('Admin.coupon.coupon_index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validation = $request->validate([
            'coupon'   => 'required',
            'discount' => 'required',
        ]);
        // Coupon Add
        $coupon           = new coupon();
        $coupon->coupon   = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification = array(
            'message'    => 'Coupon added successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.coupon.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = coupon::find($id);
        return view('Admin.coupon.coupon_edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $validation = $request->validate([
            'coupon'   => 'required',
            'discount' => 'required',
        ]);
        // Coupon Add
        $couponUpdate           = coupon::find($id);
        $couponUpdate->coupon   = $request->coupon;
        $couponUpdate->discount = $request->discount;
        $couponUpdate->save();
        $notification = array(
            'message'    => 'Coupon Updated successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.coupon.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $couponDelete = coupon::find($id);
        $couponDelete->delete();
        $notification = array(
            'message'    => 'Coupon Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.coupon.index')->with($notification);

    }
}
