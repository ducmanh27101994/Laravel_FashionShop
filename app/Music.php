<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    protected $table = 'musics';

    function singer(){
        return $this->belongsTo(Singer::class);
    }

    function album(){
        return $this->belongsTo(Album::class);
    }
}
