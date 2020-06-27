<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use Illuminate\Http\Request;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::latest()->get();
        return view('Admin.brand.brand_index', compact('brands'));
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
            'brand_name' => 'required|unique:brands,brand_name',
            'brand_logo' => 'required|image|mimes:jpg,png,jpeg',
        ]);
        // image checking
        if ($request->file('brand_logo')) {
            $brandlogo = $request->file('brand_logo');
            $brandName = date('d-m-Y') . '.' . uniqid() . '.' . $brandlogo->getClientOriginalName();
            $brandPath = public_path('/Backend/assets/images/Brand/');
            $brandlogo->move($brandPath, $brandName);
        }
        // Brand Add
        $brand             = new brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $brandName;
        $brand->save();
        $notification = array(
            'message'    => 'Brand added successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.brand.index')->with($notification);
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
        $brand = brand::find($id);
        return view('Admin.brand.brand_edit', compact('brand'));
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
            'brand_name' => 'required|unique:brands,brand_name',
        ]);
        // Brand update
        $bradUpdate = brand::find($id);
        if ($request->file('brand_logo')) {
            $brandlogo = $request->file('brand_logo');
            @unlink(public_path('/Backend/assets/images/Brand/' . $bradUpdate->brand_logo));
            $brandName = date('d-m-Y') . '.' . uniqid() . '.' . $brandlogo->getClientOriginalName();
            $brandPath = public_path('/Backend/assets/images/Brand/');
            $brandlogo->move($brandPath, $brandName);
            $bradUpdate->brand_logo = $brandName;
        }
        $bradUpdate->brand_name = $request->brand_name;
        $bradUpdate->save();
        $notification = array(
            'message'    => 'Brand Updated successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandDelete = brand::find($id);
        @unlink(public_path('/Backend/assets/images/Brand/' . $brandDelete->brand_logo));
        $brandDelete->delete();
        $notification = array(
            'message'    => 'Brand Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.brand.index')->with($notification);

    }
}
