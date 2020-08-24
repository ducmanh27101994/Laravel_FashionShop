<?php

namespace App\Http\Controllers;

use App\Album;
use App\Music;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class PageMusicController extends Controller
{
    //
    function index(){

        $musics = Music::all();
        $albums = Album::all();
        return view('Music.index',compact('musics','albums'));
    }




}
