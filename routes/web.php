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
    return view('home', [
        'page_name' => 'Home Page',
        'name' => 'Laravel 9 Course',
    ]);
})->name('home');

Route::get('/about-page', function () {
    return view('about', [
        'page_name' => 'About Page',
        'name' => 'Laravel 9 Course',
    ]);
})->name('about');

Route::get('/service-page', function () {
    $services = [
        'Web Design',
        'Web Development',
        'App Development',
        'Graphics Design',
    ];
    return view('service', compact('services'));
})->name('service');
// Route::get('/service/{service_id}/{service_name?}', function ($service_id, $service_name = null) {
//     return 'Service' . $service_id . $service_name;
//return view('service');
// })->name('service');
Route::get('/contact', function () {
    $page_name = 'Contact Page';
    $products = [
        1 => [
            'name' => 'Bag',
            'color' => 'black',
            'price' => '1200',
        ],
        2 => [
            'name' => 'Sunglass',
            'color' => 'black',
            'price' => '700',
        ],
    ];
    $product_count = 14;
    $color = 'red';

    return view('contact', compact('page_name', 'product_count', 'color', 'products'));
})->name('contact');

Route::get('/user/{id}/{name}', function ($id, $name) {
    echo $name, $id;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('/category/{category_name}', function ($category_name) {
    echo $category_name;
})->whereIn('category_name', ['electronics', 'movie', 'books', 'laptop']);

Route::get('search/{keywords}', function ($keywords) {
    echo $keywords;
})->where('keywords', '.*');
