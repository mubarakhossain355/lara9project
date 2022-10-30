<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subcategories = SubCategory::with('category')->get(['category_id', 'id', 'name', 'created_at']);

        return view('subCategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);

        return view('subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->subCategory_name,
            'slug' => Str::slug($request->subCategory_name),
            'is_active' => $request->filled('is_active'),
        ]);
        Session::flash('status', 'Sub Category Successfully Created');
        return redirect()->route('sub-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::find($id);
        return view('subCategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::get(['id', 'name']);
        $subcategory = SubCategory::find($id);
        return view('subCategory.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->update([
            'category_id' => $request->category_id,
            'name' => $request->subCategory_name,
            'slug' => Str::slug($request->subCategory_name),
            'is_active' => $request->filled('is_active'),
        ]);
        Session::flash('status', 'Sub Category Successfully Updated');
        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        Session::flash('status', 'Sub Category Successfully Deleted');
        return redirect()->route('sub-category.index');
    }
}
