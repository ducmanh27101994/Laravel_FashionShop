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
}
