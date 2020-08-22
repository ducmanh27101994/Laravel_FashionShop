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

Route::get('/login','UserController@indexLogin')->name('login.index');
Route::post('/login','UserController@storeLogin')->name('login.store');
Route::get('/register','UserController@indexRegister')->name('register');
Route::post('/register','UserController@storeRegister')->name('register.store');
Route::get('/logout','UserController@logOut')->name('logOut');


Route::get('/','HomeController@index')->name('home');

Route::get('/shop','HomeController@indexShop')->name('shop');

Route::prefix('shop-cart')->group(function (){
    Route::get('/','CartController@index')->name('shop-cart')->middleware('loginAuth');
    Route::get('/{id}','CartController@addCart')->name('shop-cart.add');
    Route::get('/delete/{id}','CartController@delete')->name('shop-cart.delete');
    Route::post('/update/{id}','CartController@update')->name('shop-cart.update');


});
Route::get('/checkout','HomeController@indexCheckOut')->name('check-out')->middleware('loginAuth');
Route::post('/placeOder','CartController@placeOder')->name('place-oder')->middleware('loginAuth');
Route::get('/product-details/{id}','ProductController@show')->name('product-details');


Route::get('/admin','UserController@indexLoginAdmin')->name('login');
Route::post('/admin','UserController@storeLoginAdmin')->name('admin.store');

    Route::middleware('auth')->prefix('products')->group(function (){
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/create','ProductController@create')->name('products.create');
        Route::post('/create','ProductController@store')->name('products.store');
        Route::get('/edit/{id}','ProductController@edit')->name('products.edit');
        Route::post('/edit/{id}','ProductController@update')->name('products.update');
        Route::get('/delete/{id}','ProductController@destroy')->name('products.delete');
    });

    Route::prefix('/order')->group(function (){
        Route::get('/','BillController@index')->name('order.index');
        Route::get('/detail/{id}','BillController@edit')->name('order.detail');
        Route::post('detail/{id}','BillController@update')->name('order.update');
        Route::post('/','BillController@searchBill')->name('order.search');
    });
    Route::prefix('/detail')->group(function (){
        Route::get('/','DetailController@index')->name('detail.index');
        Route::get('/year','DetailController@orderYear')->name('detail.orderYear');
        Route::get('/month','DetailController@orderMonth')->name('detail.orderMonth');
        Route::get('/week','DetailController@orderWeek')->name('detail.orderWeek');
        Route::get('/day','DetailController@orderDay')->name('detail.orderDay');
        Route::post('/search','DetailController@orderSearch')->name('detail.orderSearch');

    });

