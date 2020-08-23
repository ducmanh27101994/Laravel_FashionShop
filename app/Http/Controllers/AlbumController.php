<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = DB::table('albums')->select('*')->orderBy('id','desc')->get();
        return view('admin.albums.list',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.albums.create');
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
        $album = new Album();
        $album->album_name = $request->album_name;
        $album->category = $request->category;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $album->image = $path;
        }
        $album->save();
        return redirect()->route('albums.index');
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
        $album = Album::findOrFail($id);
        $albums = Album::all();
        return view('admin.albums.edit',compact('album','albums'));
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
        $album = Album::findOrFail($id);
        $album->album_name = $request->album_name;
        $album->category = $request->category;

        if ($request->hasFile('image')){
            $currentImg = $album->image;
            if($currentImg){
                Storage::delete('/public'.$currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images','public');
            $album->image = $path;
        }
        $album->save();
        return redirect()->route('albums.index');

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
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('albums.index');
    }
}
