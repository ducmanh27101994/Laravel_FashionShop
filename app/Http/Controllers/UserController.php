<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    function indexLogin()
    {
        return view('login.login');
    }

    function indexRegister()
    {
        return view('login.register');
    }

    function storeRegister(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        toastr()->success('Register Success', 'Thank you!');
        return redirect()->route('login.index');
    }

    function storeLogin(Request $request)
    {
        $getUser = DB::table('users')->select('*')->where([
            ['email', '=', $request->email],
            ['password', '=', $request->password]
        ])->get();

//        if (!Auth::attempt($data)){
//            toastr()->error('Please try again', 'Error!');
//            return redirect()->route('login');
//        }
//        toastr()->success('Login Success', 'Success!');
//        return redirect()->route('home');

        foreach ($getUser as $key => $user) {
            if ($user->email == $request->email && $user->password == $request->password) {
                Session::put('loginAuth', true);
                toastr()->success('Login Success', 'Success!');
                return redirect()->route('home');
            }
        }
        toastr()->error('Please try again', 'Error!');
        return redirect()->route('login.index');
    }

    function logOut()
    {
        Session::remove('loginAuth');

        return redirect()->route('login.index');
    }


    function indexLoginAdmin()
    {
        return view('admin.login.loginAdmin');
    }

    function storeLoginAdmin(Request $request)
    {
        $data = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (!Auth::attempt($data)) {
            toastr()->error('Please try again', 'Error!');
            return back();
        }
        toastr()->success('Login Success', 'Success!');
        return redirect()->route('products.index');
    }

    function logOutAdmin()
    {
        Session::remove('isAuth');

        return redirect()->route('login');
    }

}
