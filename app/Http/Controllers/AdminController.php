<?php

namespace App\Http\Controllers;

use App\admin;
use Auth;
use Illuminate\Http\Request;
use App\Models\Frontend\order;
use App\Models\Admin\product;
use App\Models\Admin\post;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Site All Report.. 
        // Total sale 
        $today = date('d-m-Y');
        $data['today_sale'] = order::where('date', $today)->sum('total');
        // This Month
        $month = date('m');
        $data['this_month'] = order::where('month', $month)->sum('total');
        // This Year
        $year = date('Y');
        $data['this_year'] = order::where('year', $year)->sum('total');
        // Today Deliverd
        $today_date = date('d-m-Y');
        $data['today_delievered'] = order::where('date', $today_date)->where('status', 3)->sum('total');
        // Return Order
        $data['return_order'] = order::where('return_order', 2)->sum('total');
        // Product
        $data['products'] = product::where('status', 1)->get();
        // Blog
        $data['blogs'] = post::all();
        // User
        $data['admins'] = admin::where('user_type', 2)->get();
        return view('Admin.dashboard', $data);
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin');
    }
}
