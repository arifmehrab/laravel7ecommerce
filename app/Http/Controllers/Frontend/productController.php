<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\product;
class productController extends Controller
{
    // Product Details.. 
    public function productDetails($id, $product_name){
       $product = product::where('id', $id)->where('product_name', $product_name)->first();
       // Product Color
       $color = $product->product_color;
       $productColors = explode(',', $color);
       // Product Size
       $size = $product->product_size;
       $productSizes = explode(',', $size);
       return view('layouts.pages.product_details', compact('product', 'productColors', 'productSizes'));
    }
}
