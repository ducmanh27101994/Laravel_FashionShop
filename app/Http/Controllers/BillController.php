<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Http\Services\BillServices;
use Illuminate\Http\Request;

class BillController extends Controller
{
    //
    protected $billServices;


    function __construct(BillServices $billServices)
    {
        $this->billServices = $billServices;
    }

    function index(){
        $bills = $this->billServices->getAll();
        return view('admin.orders.OrderProduct',compact('bills'));
    }

    function edit($id){
        $bill = $this->billServices->edit($id);

        $details = $this->billServices->showDetailById($id);

        return view('admin.orders.DetailOrder',compact('bill','details'));
    }

    function update(Request $request, $id){
        $this->billServices->update($request,$id);

        return redirect()->route('order.index');

    }

    function searchBill(Request $request){
        $keyword = $request->keyword;
        if ($keyword != 'all') {
            $bills = Bill::select('*')->where('status', '=', "$keyword")->orderBy('id','desc')->get();

            return view('admin.orders.OrderProduct', compact('bills'));
        } else {
            $bills = $this->billServices->getAll();
            return view('admin.orders.OrderProduct',compact('bills'));
        }

    }
}
