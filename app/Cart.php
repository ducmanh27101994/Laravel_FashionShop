<?php


namespace App;


class Cart
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQuantity = 0;

    function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;

        }
    }

    function add($product)
    {
        $productStore = ["item" => $product, "totalQuantity" => 0, "totalPrice" => 0];
        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $productStore = $this->items[$product->id];
            }
        }
        $productStore['totalQuantity']++;

        $productStore['totalPrice'] += $product->price;

        $this->items[$product->id] = $productStore;

        $this->totalQuantity++;

        $this->totalPrice += $product->price;

    }

    public function remove($id)
    {
        if ($this->items) {
            $productsInCart = $this->items;
            if (array_key_exists($id, $productsInCart)) {

                $this->totalPrice -= $productsInCart[$id]['totalPrice'];
                $this->totalQuantity -= $productsInCart[$id]['totalQuantity'];

                unset($productsInCart[$id]);

                $this->items = $productsInCart;
            }
        }
    }


}
