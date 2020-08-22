<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    function index(){
        $products = DB::table('products')->select('*')->orderBy('id','desc')->get();
        return view('shop.index',compact('products'));
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
