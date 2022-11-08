<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Mail\ProductCreated;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->with(['category','subcategory'])->get();
        return view('products.index', compact('products',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','name'])->get();
        $subcategories = SubCategory::select(['id','name'])->get();
        
         return view('products.create', compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        //dd($request->all());
        // $file_exists = $request->hasFile('image');

        // if ($file_exists) {
        //     $file = $request->file('image');
        //     $file_type = $file->getClientMimeType();
        //     $file_ext = $file->getClientOriginalExtension();
        //     $file_org_name = $file->getClientOriginalName();
            
           // dump($file->store('image'));
            //dump(Storage::disk('public')->put('image', $file));
            //dump(Storage::putFileAs('product_image',$file,'new_product_1'.'.'. $file->getClientOriginalExtension()));

            // $product_image1 = $file->storeAs('product_image',$file,'new_product_1'.'.'. $file->getClientOriginalExtension());
            // dd(Storage::url($product_image1));
    
       
        $product = Product::create([
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'name' => $request->name,
            'slug' =>Str::slug($request->name),
            'price' =>$request->price,
            'description' =>$request->description,

        ]);
        $this->image_upload($request,$product->id);

        // mail send
        $user = User::find(1);
        $updated_product = Product::find($product->id);
        Mail::to($user)->send(
            new ProductCreated($updated_product)
        );
          Toastr::success('Product Successfully Created');

            return back();

    }

    public function image_upload($request, $product_id){

        if($request->hasfile('image')){
            //photo location
            $photo_location = 'public/uploads/product_image/';
            $uploaded_photo = $request->file('image');
            $photo_name = $product_id.'.'.$uploaded_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location.$photo_name;

            Image::make($uploaded_photo)->resize(600,600)->save(base_path($new_photo_location));

            // Image field Update

            $product = Product::find($product_id);
            $product->update([
                'image' => $photo_name,
            ]);
           
            return back();

        }else{
            
            return back();
        }

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

       $categories = Category::select(['id','name'])->get();
        $subcategories = SubCategory::select(['id','name'])->get();
        $product = Product::find($id);
        
         return view('products.edit', compact('categories','subcategories','product'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('status', 'Product Successfully Deleted');
        return redirect()->route('products.index');
    }
}
