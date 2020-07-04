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
        $products = product::orderBy('id', 'desc')->get();
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
            'product_name'     => 'required|unique:products,product_name',
            'product_code'     => 'required',
            'category'         => 'required',
            'subcategory'      => 'required',
            'brand'            => 'required',
            'product_quantity' => 'required',
            'selling_price'    => 'required',
            'image1'           => 'image|mimes:jpg,png,jpeg,gif',
            'image2'           => 'image|mimes:jpg,png,jpeg,gif',
            'image3'           => 'image|mimes:jpg,png,jpeg,gif',
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
        $productShow = product::find($id);
        return view('Admin.product.product_show', compact('productShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit = product::find($id);
        $categories  = category::all();
        $brands      = brand::all();
        return view('Admin.product.product_edit', compact('productEdit', 'categories', 'brands'));
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
        // validation...
        $validate = $request->validate([
            'product_name'  => 'required',
            'product_code'  => 'required',
            'category'      => 'required',
            'selling_price' => 'required',
            'image1'        => 'image|mimes:jpg,png,jpeg,gif',
            'image2'        => 'image|mimes:jpg,png,jpeg,gif',
            'image3'        => 'image|mimes:jpg,png,jpeg,gif',
        ]);
        // Product Update...
        $productEdit                   = product::find($id);
        $productEdit->category_id      = $request->category;
        $productEdit->subcategory_id   = $request->subcategory;
        $productEdit->brand_id         = $request->brand;
        $productEdit->product_name     = $request->product_name;
        $productEdit->product_code     = $request->product_code;
        $productEdit->product_quantity = $request->product_quantity;
        $productEdit->product_details  = $request->product_details;
        $productEdit->product_color    = $request->product_color;
        $productEdit->product_size     = $request->product_size;
        $productEdit->selling_price    = $request->selling_price;
        $productEdit->discount_price   = $request->discount_price;
        $productEdit->video_link       = $request->video_link;
        $productEdit->main_slider      = $request->main_slider;
        $productEdit->hot_deal         = $request->hot_deal;
        $productEdit->best_rated       = $request->best_rated;
        $productEdit->mid_slider       = $request->mid_slider;
        $productEdit->hot_new          = $request->hot_new;
        $productEdit->trendy           = $request->trendy;
        // Image One Update
        $image_one   = $request->file('image1');
        $image_two   = $request->file('image2');
        $image_three = $request->file('image3');

        // Image One And Two Update
        if ($image_one && $image_two) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_one));
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_two));
            // Update image One..
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('Backend/assets/images/product/' . $image_one_name);
            $productEdit->image_one = $image_one_name;
            // Update image Two..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('Backend/assets/images/product/' . $image_two_name);
            $productEdit->image_two = $image_two_name;
        }
        // Image Two And Three Update
        if ($image_two && $image_three) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_two));
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_three));
            // Update image One..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('Backend/assets/images/product/' . $image_two_name);
            $productEdit->image_two = $image_two_name;
            // Update image Three..
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('Backend/assets/images/product/' . $image_three_name);
            $productEdit->image_three = $image_three_name;
        }
        // Image One And Three Update
        if ($image_one && $image_three) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_one));
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_three));
            // Update image One..
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('Backend/assets/images/product/' . $image_one_name);
            $productEdit->image_one = $image_one_name;
            // Update image Three..
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('Backend/assets/images/product/' . $image_three_name);
            $productEdit->image_three = $image_three_name;
        }
        // One image update
        if (isset($image_one)) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_one));
            // Update image One..
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(230, 300)->save('Backend/assets/images/product/' . $image_one_name);
            $productEdit->image_one = $image_one_name;
        }
        // One image update
        if (isset($image_two)) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_two));
            // Update image Two..
            $image_two_name = hexdec(uniqid()) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(230, 300)->save('Backend/assets/images/product/' . $image_two_name);
            $productEdit->image_two = $image_two_name;
        }
        // One image update
        if (isset($image_three)) {
            @unlink(public_path('/Backend/assets/images/product/' . $productEdit->image_three));
            // Update image Three..
            $image_three_name = hexdec(uniqid()) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(230, 300)->save('Backend/assets/images/product/' . $image_three_name);
            $productEdit->image_three = $image_three_name;
        }
        // Save Product Edit Data...
        $productEdit->save();
        // Notification...
        $notification = array(
            'message'    => 'Product Updated successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.product.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDelete = product::find($id);
        $img1          = $productDelete->image_one;
        $img2          = $productDelete->image_two;
        $img3          = $productDelete->image_three;
        if ($img1 && $img2 && $img3) {
            @unlink(public_path('/Backend/assets/images/product/') . $img1);
            @unlink(public_path('/Backend/assets/images/product/') . $img2);
            @unlink(public_path('/Backend/assets/images/product/') . $img3);
            $productDelete->delete();
        }
        // Notification...
        $notification = array(
            'message'    => 'Product Deleted successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.product.index')->with($notification);
    }
    // Product Active
    public function productActive($id)
    {
        $productInactive         = product::find($id);
        $productInactive->status = 1;
        $productInactive->save();
        // Notification...
        $notification = array(
            'message'    => 'Product Active successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.product.index')->with($notification);
    }
    // Product Inactive
    public function productInactive($id)
    {
        $productActive         = product::find($id);
        $productActive->status = 0;
        $productActive->save();
        // Notification...
        $notification = array(
            'message'    => 'Product Inactive successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.product.index')->with($notification);

    }
}
