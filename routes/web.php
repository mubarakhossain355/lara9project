<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\SubCategoryController;
use App\Mail\CategoryCreateMarkdown;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about-page', [FrontController::class, 'about'])->name('about');
Route::get('/service-page', [FrontController::class, 'service'])->name('service');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/send-me-details', UserInfoController::class);

Route::resource('/posts', PostController::class);
Route::resource('/category', CategoryController::class);
Route::get('/category/{category}/restore', [CategoryController::class, 'restore'])->name('category.restore');
Route::get('/category/{category}/forceDelete',[CategoryController::class,'forceDelete'])->name('category.forceDelete');
Route::resource('/sub-category', SubCategoryController::class);
Route::get('/subcategory/{subcategory}/restore', [SubCategoryController::class, 'restore'])->name('sub-category.restore');
Route::get('/subcategory/{subcategory}/forceDelete', [SubCategoryController::class, 'forceDelete'])->name('sub-category.forceDelete');
Route::get('/book', [FrontController::class, 'book']);
Route::resource('/products', ProductController::class);

Route::get('mail/preview',function(){
$category = Category::find(1);
return new CategoryCreateMarkdown($category);

});