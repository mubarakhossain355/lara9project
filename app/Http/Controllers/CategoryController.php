<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\CategoryCreated;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categories = Category::query()->withCount('subcategories')->get(['id', 'name', 'created_at']);
       
         $deletedcategories = Category::query()->onlyTrashed()->withCount('subcategories')->get(['id', 'name', 'created_at']);
       

        return view('Category.index', compact('categories','deletedcategories'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {

       $category= Category::create([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'is_active' => $request->filled('is_active'),
        ]);
        // Session::flash('status', 'Category Successfully Created');
        // Mail send Command

        $user = User::find(1);
        Mail::to($user)->send(
            new CategoryCreated($category)
        );
        Toastr::success('Category Successfully Created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {

        $category = Category::find($id);
        $category->update([

            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'is_active' => $request->filled('is_active'),
        ]);

     
        Toastr::warning('Category Successfully Updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        //Session::flash('status', 'Category Successfully Deleted');
        Toastr::warning('Category Successfully Deleted');
        return redirect()->route('category.index');
    }

    public function restore($category_id){
       Category::onlyTrashed()->find($category_id)->restore();
        Toastr::warning('Category Successfully Restore');
        return redirect()->route('category.index');
    }

    public function forceDelete($category_id){
        Category::onlyTrashed()->find($category_id)->forceDelete();
        Toastr::warning('Category Successfully Permanently!');
        return redirect()->route('category.index');
    }
}
