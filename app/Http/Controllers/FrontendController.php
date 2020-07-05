<?php

namespace App\Http\Controllers;

use App\Models\Admin\product;
use App\Models\Admin\category;
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
        return view('layouts.pages.index', compact('bannerProduct', 'feturedProduct', 'trendyProduct', 'bestRated', 'hotDeal', 'popularCategories', 'midSliders'));
    }
}
