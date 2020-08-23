<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    //
    function index(){
        return view('Music.index');
    }
}
