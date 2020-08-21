<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    function index(){
        return view('shop.index');
    }

    function indexShopCart(){
        return view('shop.shop-cart');
    }

    function indexCheckOut(){
        return view('shop.checkout');
    }

    function indexShop(){
        return view('shop.shop');
    }
}
