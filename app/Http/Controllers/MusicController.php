<?php

namespace App\Http\Controllers;

use App\Album;
use App\Music;
use App\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $musics = DB::table('musics')->select('*')->orderBy('id','desc')->get();
        return view('admin.musics.list',compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $albums = Album::all();
        $singers = Singer::all();
        return view('admin.musics.create',compact('albums','singers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $music = new Music();
        $music->music_name = $request->music_name;
        $music->nation = $request->nation;
        $music->author = $request->author;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $music->image = $path;
        }

        if($request->hasFile('audio')){
            $audio = $request->file('audio');

            $path1 = $audio->store('audios','public');
            $music->audio = $path1;
        }

        $music->album_id = $request->album_id;
        $music->singer_id = $request->singer_id;
        $music->save();
        return redirect()->route('musics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $music = Music::findOrFail($id);
        $singers = Singer::all();
        $albums = Album::all();
        return view('admin.musics.edit',compact('music','singers','albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $music = Music::findOrFail($id);
        $music->music_name = $request->music_name;
        $music->nation = $request->nation;
        $music->author = $request->author;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $music->image = $path;
        }

        if($request->hasFile('audio')){
            $audio = $request->file('audio');

            $path1 = $audio->store('audios','public');
            $music->audio = $path1;
        }

        $music->album_id = $request->album_id;
        $music->singer_id = $request->singer_id;
        $music->save();
        return redirect()->route('musics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $music = Music::findOrFail($id);
        $music->delete();
        return redirect()->route('musics.index');
    }
}
