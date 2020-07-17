<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\post;
use Session;
class blogController extends Controller
{
    // All Blog post... 
    public function blogPost() 
    {
        $blogs = post::latest()->get();
        return view('layouts.pages.blog', compact('blogs'));
    }
    // English Langusge... 
    public function englishLanguage() 
    {
       Session::get('language');
       Session::forget('language');
       Session::put('language','english');
       // redirect
       return redirect()->back();
    }
    // Bangla Langusge... 
    public function banglaLanguage() 
    {
       Session::get('language');
       Session::forget('language');
       Session::put('language', 'bangla');
       // redirect
       return redirect()->back();
    }
}
