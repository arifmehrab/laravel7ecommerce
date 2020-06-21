<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use App\Models\Admin\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class subCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = subcategory::latest()->get();
        $categories    = category::all();
        return view('Admin.subcategory.subcategory_index', compact('subcategories', 'categories'));
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
            'category'    => 'required',
            'subcategory' => 'required|unique:subcategories,subcategory_name',
        ]);
        // subCategory Add
        $subcategory                   = new subcategory();
        $subcategory->category_id      = $request->category;
        $subcategory->subcategory_name = $request->subcategory;
        $subcategory->subcategory_slug = str::slug($request->subcategory, '-');
        $subcategory->save();
        $notification = array(
            'message'    => 'subcategory add successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.subcategory.index')->with($notification);
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
        $subcategory = subcategory::find($id);
        $categories    = category::all();
        return view('Admin.subcategory.subcategory_edit', compact('subcategory', 'categories'));
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
            'category'    => 'required',
            'subcategory' => 'required|unique:subcategories,subcategory_name',
        ]);
        // subCategory update
        $subcategoryupdate                   = subcategory::find($id);
        $subcategoryupdate->category_id      = $request->category;
        $subcategoryupdate->subcategory_name = $request->subcategory;
        $subcategoryupdate->subcategory_slug = str::slug($request->subcategory, '-');
        $subcategoryupdate->save();
        $notification = array(
            'message'    => 'subcategory Updated successfuly',
            'alert-type' => 'success',
        );
        // Redirect
        return redirect()->route('admin.subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoryDelete = subcategory::find($id);
        $subcategoryDelete->delete();
        $notification = array(
            'message'    => 'subCategory Deleted Successfully',
            'alert-type' => 'success',
        );
        // redirect
        return redirect()->route('admin.subcategory.index')->with($notification);
    }
}
