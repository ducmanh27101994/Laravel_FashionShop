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


Route::get('/','HomeController@index')->name('home');
Route::get('/shop-cart','HomeController@indexShopCart')->name('shop-cart');
Route::get('/checkout','HomeController@indexCheckOut')->name('check-out');
Route::get('/shop','HomeController@indexShop')->name('shop');

Route::prefix('/admin')->group(function (){

    Route::prefix('products')->group(function (){
        Route::get('/','ProductController@index')->name('products.index');
    });

});
