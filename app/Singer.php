<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    //
//    function albums(){
//        return $this->belongsToMany(Album::class,'musics','singer_id','album_id');
//    }

    function musics(){
        return $this->hasMany(Music::class,'singer_id');
    }
}
