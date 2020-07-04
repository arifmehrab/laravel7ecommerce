<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\product;

class FrontendController extends Controller
{
    // Home View 
    public function index(){
        // Banner Product..
        $bannerProduct = product::where('status', 1)->where('main_slider', 1)->orderBy('id','desc')->first();
        // Fetured Product.. 
        $feturedProduct = product::where('status', 1)->orderBy('id', 'desc')->take(20)->get();
        // Trendy Product.. 
        $trendyProduct = product::where('status', 1)->where('trendy', 1)->orderBy('id', 'desc')->get();
        // Best Rated Product.. 
        $bestRated = product::where('status', 1)->where('best_rated', 1)->orderBy('id', 'desc')->get();
        return view('layouts.pages.index', compact('bannerProduct', 'feturedProduct', 'trendyProduct', 'bestRated'));
    }
}
