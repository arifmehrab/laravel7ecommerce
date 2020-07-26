<?php

namespace App\Http\Controllers\Admin\setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\seo;
use Illuminate\Http\Request;

class settingController extends Controller
{
    // Seo
    public function seo()
    {
        $seo = seo::first();
        return view('Admin.settings.seo', compact('seo'));
    }
    // Seo Update
    public function seoUpdate(Request $request, $id)
    {
        // validatin
        $validation = $request->validate([
            'meta_title'  => 'required',
            'meta_author' => 'required',
            'meta_tag'    => 'required',
        ]);
        // update
        $seoUpdate = seo::find($id);
        $seoUpdate->meta_title = $request->meta_title;
        $seoUpdate->meta_author = $request->meta_author;
        $seoUpdate->meta_tag = $request->meta_tag;
        $seoUpdate->meta_description = $request->meta_description;
        $seoUpdate->google_analytics = $request->google_analytics;
        $seoUpdate->bring_analytics = $request->bring_analytics;
        $seoUpdate->save();
        // Notification...
        $notification = array(
            'message'    => 'Seo setting successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.seo')->with($notification);
    }
}
