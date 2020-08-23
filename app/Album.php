<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = 'albums';

    function singer(){
        return $this->belongsToMany(Singer::class,'musics','album_id','singer_id');
    }

    function musics(){
        return $this->hasMany(Music::class,'album_id');
    }
}
