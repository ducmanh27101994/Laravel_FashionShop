<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageMusicController extends Controller
{
    //
    function index(){
        return view('Music.index');
    }
}
