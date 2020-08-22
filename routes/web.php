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

Route::get('/shop','HomeController@indexShop')->name('shop');

Route::prefix('shop-cart')->group(function (){
    Route::get('/','CartController@index')->name('shop-cart');
    Route::get('/{id}','CartController@addCart')->name('shop-cart.add');
    Route::get('/delete/{id}','CartController@delete')->name('shop-cart.delete');
    Route::post('/update/{id}','CartController@update')->name('shop-cart.update');

});
Route::get('/checkout','HomeController@indexCheckOut')->name('check-out');
Route::post('/placeOder','CartController@placeOder')->name('place-oder');
Route::get('/product-details/{id}','ProductController@show')->name('product-details');







Route::prefix('/admin')->group(function (){
    Route::prefix('products')->group(function (){
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/create','ProductController@create')->name('products.create');
        Route::post('/create','ProductController@store')->name('products.store');
        Route::get('/edit/{id}','ProductController@edit')->name('products.edit');
        Route::post('/edit/{id}','ProductController@update')->name('products.update');
        Route::get('/delete/{id}','ProductController@destroy')->name('products.delete');
    });

    Route::prefix('/order')->group(function (){
        Route::get('/','BillController@index')->name('order.index');
    });
});
