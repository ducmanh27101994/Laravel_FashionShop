<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepositories
{
    protected $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }

    function getAll(){
        return $this->product->Select('*')->orderBy('id','desc')->get();
    }

    function save($product){
        $product->save();
    }

    function findById($id){
        return $this->product->findOrFail($id);
    }

}
