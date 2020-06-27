<?php

namespace App\Http\Controllers\Admin\product;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use App\Models\Admin\category;
use App\Models\Admin\product;
use App\Models\Admin\subcategory;
use Illuminate\Http\Request;
use Image;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('Admin.product.product_index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        $brands     = brand::all();
        return view('Admin.product.product_create', compact('categories', 'brands'));
    }

    // Subcategory get by ajax
    public function subCategoryGet(Request $request)
    {
        $category_id = $request->category_id;
        $subCategory = subcategory::where('category_id', $category_id)->get();
        return response()->json($subCategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation...
        $validate = $request->validate([
            'product_name'  => 'required|unique:products,product_name',
            'product_code'  => 'required',
            'category'      => 'required',
            'selling_price' => 'required',
            'image1'        => 'required|image|mimes:jpg,png,jpeg,gif',
            'image2'        => 'image',
            'image3'        => 'image',
        ]);
        // Product Insert...
        $product                   = new product();
        $product->category_id      = $request->category;
        $product->subcategory_id   = $request->subcategory;
        $product->brand_id         = $request->brand;
        $product->product_name     = $request->product_name;
        $product->product_code     = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->product_details  = $request->product_details;
        $product->product_color    = $request->product_color;
        $product->product_size     = $request->product_size;
        $product->selling_price    = $request->selling_price;
        $product->video_link       = $request->video_link;
        $product->main_slider      = $request->main_slider;
        $product->hot_deal         = $request->hot_deal;
        $product->best_rated       = $request->best_rated;
        $product->mid_slider       = $request->mid_slider;
        $product->hot_new          = $request->hot_new;
        $product->trendy           = $request->trendy;
        $product->status           = 1;
        // image upload...
        $image_one   = $request->file('image1');
        $image_two   = $request->file('image2');
        $image_three = $request->file('image3');
        if ($image_one && $image_two && $image_three) {
            // Image One Upload...
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('Backend/assets/images/product/' . $image_one_name);
            $product->image_one = $image_one_name;
            // Image Two Upload...
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('Backend/assets/images/product/' . $image_two_name);
            $product->image_two = $image_two_name;
            // Image Three Upload...
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('Backend/assets/images/product/' . $image_three_name);
            $product->image_three = $image_three_name;
        }
        // Save Product Data...
        $product->save();
        // Notification...
        $notification = array(
            'message'    => 'Product added successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('ok');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
