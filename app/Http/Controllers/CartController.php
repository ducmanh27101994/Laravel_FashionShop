<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Customer;
use App\Detail;
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

    function placeOder(Request $request){
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();

        $bill = new Bill();
        $bill->totalPrice = $cart->totalPrice;
        $bill->note = $request->note;
        $bill->status = 'Pending';
        $bill->customer_id = $customer->id;
        $bill->save();

        foreach ($cart->items as $key=>$product){
            $details = new Detail();
            $details->bill_id = $bill->id;
            $details->product_id = $key;
            $details->quantityOrder = $product['totalQty'];
            $details[$key] = $details->save();
        }

        Session::forget('cart');
        toastr()->success('Successful Srder', 'Thank you!');


        return redirect()->route('home');
    }

}
