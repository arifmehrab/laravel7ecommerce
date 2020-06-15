<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\admin;
class ProfileUpdate extends Controller
{
    public function index(){
        $admin = admin::find(Auth::admin()->id);
        return view('Admin.Auth.admin_profile_update', compact('admin'));
    }
}
