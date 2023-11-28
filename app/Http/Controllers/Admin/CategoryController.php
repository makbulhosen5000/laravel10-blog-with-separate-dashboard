<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('admin.pages.category',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($category->name);
        $category->description = $request->description;
        $category->save();
        Alert::success("Category Created Successfully");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($category->name);
        $category->description = $request->description;
        $category->update();
        Alert::success("Category Updated Successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryDelete = Category::find($id);
        $categoryDelete->delete();
        //Alert::success("Category Delete Successfully");
        return redirect()->back();
    }
}
