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

Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('home');


// Route::get('/', function () {
//     return view('welcome');    
// });

Auth::routes();


/* PRODUCT ROUTES*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/product',App\Http\Controllers\ProductController::class);
Route::post('/search',[App\Http\Controllers\ProductController::class,'search'])->name('product.search');

/* CATEGORY ROUTES*/
Route::resource('/category',App\Http\Controllers\CategoryController::class);
