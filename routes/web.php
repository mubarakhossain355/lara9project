<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about-page', function () {
    return view('about');
})->name('about');

Route::get('/service/{service_id}/{service_name?}', function ($service_id, $service_name = null) {
    return 'Service' . $service_id . $service_name;
    //return view('service');
})->name('service');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
