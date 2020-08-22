<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepositories;
use Illuminate\Http\Request;

class BillServices
{
    protected $billRepo;

    function __construct(BillRepositories $billRepo)
    {
        $this->billRepo = $billRepo;
    }

    function getAll(){
        return $this->billRepo->getAll();
    }

    function edit($id){
        return $this->billRepo->findById($id);
    }

    function store(Request $request,$id){
        $bill = $this->billRepo->findById($id);
        $bill->status = $request->status;

        $this->billRepo->save($bill);
    }

    function update(Request $request,$id){
        $bill = $this->billRepo->findById($id);
        $bill->status = $request->status;

        $this->billRepo->save($bill);
    }

    function showDetailById($id){
        return $this->billRepo->showDetailById($id);
    }
}
