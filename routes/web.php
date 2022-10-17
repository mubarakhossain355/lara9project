<?php

use App\Http\Controllers\FrontController;
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

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about-page', [FrontController::class, 'about'])->name('about');
Route::get('/service-page', [FrontController::class, 'service'])->name('service');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/send-me-details', [FrontController::class, 'sendDetails']);
