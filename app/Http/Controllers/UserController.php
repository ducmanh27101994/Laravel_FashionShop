<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    function indexLogin(){
        return view('login.login');
    }

    function indexRegister(){
        return view('login.register');
    }

    function storeRegister(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        toastr()->success('Register Success', 'Thank you!');
        return redirect()->route('login');
    }

}
