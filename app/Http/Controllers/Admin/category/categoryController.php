<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::latest()->get();
        //return response()->json($categories);
        return view('Admin.category.category_index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'category' => 'required|unique:categories,category_name',
        ]);
        // Category Add
        $category                = new category();
        $category->category_name = $request->category;
        $category->category_slug = str::slug($request->category, '-');
        $category->save();
        $notification = array(
            'messege'=> 'category add successfuly',
            'alert-type'=>'success'
           );

        // Redirect
        return redirect()->route('admin.category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        return view('Admin.category.category_edit', compact('category'));
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
        $categoryUpdate                = category::find($id);
        $categoryUpdate->category_name = $request->category;
        $categoryUpdate->category_slug = str::slug($request->category, '-');
        $categoryUpdate->save();
        // Redirect
        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryDelete = category::find($id);
        $categoryDelete->delete();
        // redirect
        return redirect()->route('admin.category.index')->with('success', 'Category Deleted successfully');
    }
}
