<?php

namespace App\Http\Controllers;

use App\Models\Admin\product;
use App\Models\Admin\category;
use App\Models\Frontend\wishlist;
use Auth;
class FrontendController extends Controller
{
    // Home View
    public function index()
    {
        // Banner Product..
        $bannerProduct = product::where('status', 1)->where('main_slider', 1)->orderBy('id', 'desc')->first();
        // Fetured Product..
        $feturedProduct = product::where('status', 1)->orderBy('id', 'desc')->take(20)->get();
        // Trendy Product..
        $trendyProduct = product::where('status', 1)->where('trendy', 1)->orderBy('id', 'desc')->get();
        // Best Rated Product..
        $bestRated = product::where('status', 1)->where('best_rated', 1)->orderBy('id', 'desc')->get();
        // Hot deal Product..
        $hotDeal = product::where('status', 1)->where('hot_deal', 1)->orderBy('id', 'desc')->get();
        // Hot deal Product..
        $midSliders = product::where('status', 1)->where('mid_slider', 1)->take(6)->orderBy('id', 'desc')->get();
        // Popular Categories.. 
        $popularCategories = category::all();
        // Electronict category Product.. 
        $el_Cat= category::skip(2)->first(); 
        $elcategory_id = $el_Cat->id;
        $electronicProducts = product::where('category_id', $elcategory_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        // Man's category Product.. 
         $man_cat = category::first();
         $mancategory_id = $man_cat->id;
         $mansProducts = product::where('category_id', $mancategory_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        // Woman's category Product.. 
        $wo_category = category::skip(1)->first();
        $wocategory_id = $wo_category->id;
        $womansProducts = product::where('category_id', $wocategory_id)->where('status', 1)->orderBy('id', 'DESC')->get();
        // Hot new Product.. 
        $hot_new = product::where('hot_new', 1)->where('status', 1)->orderBy('id', 'DESC')->take(12)->get();
       
        return view('layouts.pages.index', compact('bannerProduct', 'feturedProduct', 'trendyProduct', 'bestRated', 'hotDeal', 'popularCategories', 'midSliders', 'electronicProducts', 'mansProducts', 'womansProducts', 'hot_new'));
    }
}
