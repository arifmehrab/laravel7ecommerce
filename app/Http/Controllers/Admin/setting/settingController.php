<?php

namespace App\Http\Controllers\Admin\setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\seo;
use App\Models\Admin\setting;
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
        $seoUpdate                   = seo::find($id);
        $seoUpdate->meta_title       = $request->meta_title;
        $seoUpdate->meta_author      = $request->meta_author;
        $seoUpdate->meta_tag         = $request->meta_tag;
        $seoUpdate->meta_description = $request->meta_description;
        $seoUpdate->google_analytics = $request->google_analytics;
        $seoUpdate->bring_analytics  = $request->bring_analytics;
        $seoUpdate->save();
        // Notification...
        $notification = array(
            'message'    => 'Seo setting successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.seo')->with($notification);
    }
    // Site Info Setting
    public function siteSetting()
    {
        $site_info = setting::first();
        return view('Admin.settings.site_info', compact('site_info'));
    }
    // site Info Update
    public function siteSettingUpdate(Request $request, $id)
    {
        // update
        $settingUpdate                  = setting::find($id);
        $settingUpdate->vat             = $request->vat;
        $settingUpdate->shipping_charge = $request->shipping_charge;
        // image checking
        if ($request->file('logo')) {
            $logo = $request->file('logo');
            @unlink(public_path('/Backend/assets/images/settings/logo/' . $settingUpdate->logo));
            $logoName = date('d-m-Y') . '.' . uniqid() . '.' . $logo->getClientOriginalName();
            $logoPath = public_path('/Backend/assets/images/settings/logo/');
            $logo->move($logoPath, $logoName);
            $settingUpdate->logo = $logoName;
        }
        $settingUpdate->shop_name    = $request->shop_name;
        $settingUpdate->email        = $request->email;
        $settingUpdate->phone        = $request->phone;
        $settingUpdate->address      = $request->address;
        $settingUpdate->facebook_url = $request->facebook_url;
        $settingUpdate->twitter_url  = $request->twitter_url;
        $settingUpdate->youtube_url  = $request->youtube_url;
        $settingUpdate->vimeo_url    = $request->vimeo_url;
        $settingUpdate->copyright    = $request->copyright;
        $settingUpdate->save();
        // Notification
        $notification = array(
            'message'    => 'Site Info Updated Successfullly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->back()->with($notification);
    }
}
