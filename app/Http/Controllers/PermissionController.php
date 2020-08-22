<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionController extends Controller
{
    //
    function index(){
        $users = DB::table('users')->select('*')->where('role','=','admin')->orWhere('role','=','user')->get();

        return view('admin.permission.list',compact('users'));
    }

    function create(){
        return view('admin.permission.create');
    }

    function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('permission.index');
    }

    function edit($id){
        $user = User::findOrFail($id);
        $users = DB::table('users')->select('*')->where('role','=','admin')->orWhere('role','=','user')->get();
        return view('admin.permission.edit',compact('user','users'));
    }

    function update(Request $request,$id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('permission.index');
    }

    function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('permission.index');
    }
}
