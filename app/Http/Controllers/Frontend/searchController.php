<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use App\Models\Admin\product;
use App\Models\Admin\subcategory;
use DB;
use Illuminate\Http\Request;

class searchController extends Controller
{
    // Product Search By Ajax
    public function productSearch(Request $request)
    {
        $search   = $request->product_title;
        $products = product::where('product_name', 'LIKE', '%' . $search . '%')
            ->where('status', 1)->get();
        return view('layouts.pages.search_live_resuit', compact('products'));
    }
    // Search By page Load
    public function productSearchResuit(Request $request)
    {
        $brands          = brand::select('brand_name')->get();
        $subcategory     = subcategory::select('subcategory_name')->get();
        $search_keyword  = $request->search;
        $search_products = DB::table('products')
            ->join('brands', 'products.brand_id', 'brands.id')
            ->select('products.*', 'brands.brand_name')
            ->where('product_name', 'LIKE', '%' . $search_keyword . '%')
            ->orWhere('brand_name', 'LIKE', '%' . $search_keyword . '%')
            ->paginate(15);
        return view('layouts.pages.search_resuit', compact('brands', 'subcategory', 'search_keyword', 'search_products'));
    }
}
