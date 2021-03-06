<?php

namespace App\Http\Controllers;

use App\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $singers = DB::table('singers')->select('*')->orderBy('id','desc')->get();
        return view('admin.singers.list',compact('singers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.singers.create');
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
        $singer = new Singer();
        $singer->singer_name = $request->singer_name;
        $singer->gender = $request->gender;
        $singer->age = $request->age;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $singer->image = $path;
        }
        $singer->save();
        return redirect()->route('singers.index');
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
        $singer = Singer::findOrFail($id);
        return view('admin.singers.edit',compact('singer'));
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
        $singer = Singer::findOrFail($id);
        $singer->singer_name = $request->singer_name;
        $singer->gender = $request->gender;
        $singer->age = $request->age;

        if ($request->hasFile('image')){
            $currentImg = $singer->image;
            if($currentImg){
                Storage::delete('/public'.$currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images','public');
            $singer->image = $path;
        }
        $singer->save();
        return redirect()->route('singers.index');
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
        $singer = Singer::findOrFail($id);
        $singer->delete();
        return redirect()->route('singers.index');
    }
}
