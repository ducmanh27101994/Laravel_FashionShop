<?php

namespace App\Http\Controllers;

use App\Album;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageMusicController extends Controller
{
    //
    function index(){

        $musics = Music::all();
        $albums = Album::all();

        $lists =  DB::table('singers')
            ->join('musics','singers.id','musics.singer_id')
            ->join('albums','musics.album_id','albums.id')

            ->select('singers.*','musics.*','albums.*')
            ->where('albums.category','=',"K Pop")
            ->get();

        return view('Music.index',compact('musics','albums','lists'));
    }

    function showAlbums($id){
        $shows =  DB::table('singers')
            ->join('musics','singers.id','musics.singer_id')
            ->join('albums','musics.album_id','albums.id')

            ->select('singers.*','musics.*','albums.*')
            ->where('albums.id','=',"$id")
            ->get();

        return view('Music.about-us',compact('shows'));


    }


}
