<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use App\Models\Admin\category;
use App\Models\Admin\product;
use App\Models\Admin\subcategory;
use DB;
use Illuminate\Http\Request;

class productController extends Controller
{
    // Product Details..
    public function productDetails($id, $product_name)
    {
        $product = product::where('id', $id)->where('product_name', $product_name)->first();
        // Product Color
        $color         = $product->product_color;
        $productColors = explode(',', $color);
        // Product Size
        $size         = $product->product_size;
        $productSizes = explode(',', $size);
        // Related product
        $p = product::where('id', $id)->where('status', 1)->first();
        $cat_id = $p->category_id;
        $related_products = product::where('category_id', $cat_id)->where('status', 1)->inRandomOrder()->limit(10)->get();
        // Brands Logo
        $brands = brand::select('brand_logo')->get();
        return view('layouts.pages.product_details', compact('product', 'productColors', 'productSizes', 'related_products', 'brands'));
    }
    // Product View By Ajax..
    public function productView(Request $request)
    {
        $product_id = $request->product_id;
        $product    = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')
            ->where('products.id', $product_id)->first();
        $color = explode(',', $product->product_color);
        $size  = explode(',', $product->product_size);
        return response()->json(array(
            'product' => $product,
            'color'   => $color,
            'size'    => $size,
        ));
    }
    // category Wais product...
    public function CategoryProducts($id, $catname)
    {
        $categoryProducts    = product::where('category_id', $id)->paginate(20);
        $brands              = product::where('category_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        $subcategoryproducts = product::where('category_id', $id)->select('subcategory_id')->groupBy('subcategory_id')->get();
        return view('layouts.pages.category_product', compact('categoryProducts', 'brands', 'subcategoryproducts', 'catname'));
    }
    // Subcategory Wais product...
    public function subCategoryProducts($id, $subcatname)
    {
        $subcatProducts = product::where('subcategory_id', $id)->paginate(20);
        $brands         = product::where('subcategory_id', $id)->select('brand_id')->groupBy('brand_id')->get();
        $categories     = category::select('id', 'category_name')->get();
        return view('layouts.pages.subcategory_product', compact('subcatProducts', 'brands', 'categories', 'subcatname'));

    }
    // products Shop
    public function productShop()
    {
        $brands        = brand::all();
        $categories    = category::all();
        $subcategories = subcategory::all();
        $products      = product::where('status', 1)->paginate(15);
        return view('layouts.pages.shop_page', compact('products', 'categories', 'subcategories', 'brands'));
    }
}
