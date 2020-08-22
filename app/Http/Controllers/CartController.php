<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    protected $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }

    function addCart($id)
    {
        $product = $this->product->findOrFail($id);
        $oldCart = Session::get('cart');

        $newCart = new Cart($oldCart);
        $newCart->add($product);

        Session::put('cart', $newCart);

        $data = [
            'productUpdate' => Session::get('cart')->items[$id],

            'totalPriceCart' => Session::get('cart')->totalPrice
        ];

        return response()->json($data);

    }

    function index()
    {
        $cart = Session::get('cart');

        return view('shop.shop-cart', compact('cart'));
    }

    function delete($id)
    {
        if (Session::has('cart')) {

            $oldCart = Session::get('cart');

            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->remove($id);
                Session::put('cart', $cart);
            }
        }
        return back();
    }

    public function update(Request $request, $idProduct)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->update($request, $idProduct);
                Session::put('cart', $cart);

            }
        }

        $data = [
            'productUpdate' => Session::get('cart')->items[$idProduct],

            'totalPriceCart' => Session::get('cart')->totalPrice
        ];

        return response()->json($data);
    }

}