<?php

namespace App\Http\Controllers\Admin\Auth;

use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userRoleController extends Controller
{
    // user List
    public function userList()
    {
        $subAdmins = admin::where('user_type', 2)->get();
        return view('Admin.userRole.user_list', compact('subAdmins'));
    }
    // Add user
    public function addUser()
    {
        return view('Admin.userRole.user_add');
    }
    // User Store
    public function userStore(Request $request)
    {
        // Validatin
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:admins',
            'phone'    => 'required',
            'password' => 'required|min:5',
        ]);
        // User Store
        $userStore                  = new admin();
        $userStore->name            = $request->name;
        $userStore->email           = $request->email;
        $userStore->phone           = $request->phone;
        $userStore->password        = Hash::make($request->password);
        $userStore->category        = $request->category;
        $userStore->coupon          = $request->coupon;
        $userStore->product         = $request->product;
        $userStore->blog            = $request->blog;
        $userStore->order           = $request->order;
        $userStore->report          = $request->report;
        $userStore->setting         = $request->setting;
        $userStore->user_role       = $request->user_role;
        $userStore->return_order    = $request->return_order;
        $userStore->contact_message = $request->contact_message;
        $userStore->product_comment = $request->product_comment;
        $userStore->user_type       = 2;
        $userStore->save();
        // Notification
        $notification = array(
            'message'    => 'sub Admin Created Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.user.list')->with($notification);

    }
    // user Edit
    public function userEdit($id)
    {
        $userEdit = admin::find($id);
        return view('Admin.userRole.user_edit', compact('userEdit'));
    }
    // User Update
    public function userUpdate(Request $request, $id)
    {
        $userUpdate                  = admin::find($id);
        $userUpdate->name            = $request->name;
        $userUpdate->email           = $request->email;
        $userUpdate->phone           = $request->phone;
        $userUpdate->category        = $request->category;
        $userUpdate->coupon          = $request->coupon;
        $userUpdate->product         = $request->product;
        $userUpdate->blog            = $request->blog;
        $userUpdate->order           = $request->order;
        $userUpdate->report          = $request->report;
        $userUpdate->setting         = $request->setting;
        $userUpdate->user_role       = $request->user_role;
        $userUpdate->return_order    = $request->return_order;
        $userUpdate->contact_message = $request->contact_message;
        $userUpdate->product_comment = $request->product_comment;
        $userUpdate->user_type       = 2;
        $userUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'sub Admin Updated Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.user.list')->with($notification);
    }
    // User Destory
    public function userDestory($id)
    {
        $userDelete = admin::find($id);
        $userDelete->delete();
         // Notification
         $notification = array(
            'message'    => 'sub Admin Deleted Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.user.list')->with($notification);
    }
}
