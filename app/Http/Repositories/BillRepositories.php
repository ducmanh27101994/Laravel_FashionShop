<?php


namespace App\Http\Repositories;


use App\Bill;
use Illuminate\Support\Facades\DB;

class BillRepositories
{
    protected $bill;

    function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    function getAll(){
        return $this->bill->select('*')->orderBy('id','desc')->get();
    }

    function save($bill){
        $bill->save();
    }

    function findById($id){
        return $this->bill->findOrFail($id);
    }

    function showDetailById($id){
        return DB::table('customers')
            ->join('bills','customers.id','bills.customer_id')
            ->join('details','bills.id','details.bill_id')
            ->join('products','details.product_id','products.id')
            ->select('customers.*','bills.*','details.*','products.*')
            ->where('bills.id','=',"$id")
            ->get();
    }
}
