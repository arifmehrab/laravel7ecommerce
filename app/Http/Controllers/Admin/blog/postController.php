<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\post;
use App\Models\Admin\postcategory;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::latest()->get();
        return view('Admin.post.post_index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcategories = postcategory::all();
        return view('Admin.post.post_create', compact('postcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validation = $request->validate([
            'postcategory_id' => 'required|unique:brands,brand_name',
            'post_title_en'   => 'required|unique:posts,post_title_en',
            'post_title_bn'   => 'required|unique:posts,post_title_bn',
            'post_details_en' => 'required',
            'post_details_bn' => 'required',
            'post_image'      => 'required|image|mimes:jpg,png,jpeg',
        ]);
        // image checking
        if ($request->file('post_image')) {
            $postImage = $request->file('post_image');
            $postName  = date('d-m-Y') . '.' . uniqid() . '.' . $postImage->getClientOriginalName();
            $postPath  = public_path('/Backend/assets/images/post/');
            $postImage->move($postPath, $postName);
        }
        // post Insert
        $postInsert                  = new post();
        $postInsert->postcategory_id = $request->postcategory_id;
        $postInsert->post_title_en   = $request->post_title_en;
        $postInsert->post_title_bn   = $request->post_title_bn;
        $postInsert->post_details_en = $request->post_details_en;
        $postInsert->post_details_bn = $request->post_details_bn;
        $postInsert->post_image      = $postName;
        $postInsert->save();
        $notification = array(
            'message'    => 'Post added successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.post.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('Admin.post.post_view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        $postcategories = postcategory::all();
        return view('Admin.post.post_edit', compact('post', 'postcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // validation
         $validation = $request->validate([
            'postcategory_id' => 'required',
            'post_title_en'   => 'required',
            'post_title_bn'   => 'required',
            'post_details_en' => 'required',
            'post_details_bn' => 'required',
            'post_image'      => 'image|mimes:jpg,png,jpeg',
        ]);
        // post Insert
        $postUpdate = post::find($id);
        $postUpdate->postcategory_id = $request->postcategory_id;
        $postUpdate->post_title_en   = $request->post_title_en;
        $postUpdate->post_title_bn   = $request->post_title_bn;
        $postUpdate->post_details_en = $request->post_details_en;
        $postUpdate->post_details_bn = $request->post_details_bn;
          // image checking
          if ($request->file('post_image')) {
            $postUpdate = post::find($id);
                @unlink(public_path('/Backend/assets/images/post/'.$postUpdate->post_image));
                $postImage = $request->file('post_image');
                $postName  = date('d-m-Y') . '.' . uniqid() . '.' . $postImage->getClientOriginalName();
                $postPath  = public_path('/Backend/assets/images/post/');
                $postImage->move($postPath, $postName);
                $postUpdate->post_image = $postName;
            }
        $postUpdate->save();
        // Notifications
        $notification = array(
            'message'    => 'Post added successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.post.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postDelete = post::find($id);
        @unlink(public_path('/Backend/assets/images/post/' . $postDelete->post_image));
        $postDelete->delete();
        $notification = array(
            'message'    => 'Post Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.post.index')->with($notification);

    }
}
