<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //

    function index(){
        $products = DB::table('products')->select('*')->orderBy('id','desc')->paginate(8);
        return view('shop.index',compact('products'));
    }

    function indexShopCart(){
        return view('shop.shop-cart');
    }

    function indexCheckOut(){
        $cart = Session::get('cart');
        return view('shop.checkout',compact('cart'));
    }

    function indexShop(){
        $products = DB::table('products')->select('*')->orderBy('id','desc')->get();
        return view('shop.shop',compact('products'));
    }
}
