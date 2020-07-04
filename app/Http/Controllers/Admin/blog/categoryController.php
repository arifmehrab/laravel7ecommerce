<?php

namespace App\Http\Controllers\Admin\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\postcategory;

class categoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcategories = postcategory::latest()->get();
        //return response()->json($categories);
        return view('Admin.postcategory.category_index', compact('postcategories'));
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
        'category_name_en' => 'required|unique:postcategories,category_name_en',
        'category_name_bn' => 'required|unique:postcategories,category_name_bn',
    ]);
    // postCategory Add
    $postcategory                = new postcategory();
    $postcategory->category_name_en = $request->category_name_en;
    $postcategory->category_name_bn = $request->category_name_bn;
    $postcategory->save();
    $notification = array(
        'message'    => 'postcategory add successfuly',
        'alert-type' => 'success',
    );
    // Redirect
    return redirect()->route('admin.postcategory.index')->with($notification);
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
        $postcategory = postcategory::find($id);
        return view('Admin.postcategory.category_edit', compact('postcategory'));
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
        $postcategoryUpdate                = postcategory::find($id);
        $postcategoryUpdate->category_name_en = $request->category_name_en;
        $postcategoryUpdate->category_name_bn = $request->category_name_bn;
        $postcategoryUpdate->save();
        $notification = array(
            'message'    => 'Category Updated Successfully',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.postcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postcategoryDelete = postcategory::find($id);
        $postcategoryDelete->delete();
        $notification = array(
            'message'    => 'postCategory Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.postcategory.index')->with($notification);
    }
}
