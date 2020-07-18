<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['title'];

    public function post(){
        return $this->belongsTo('App\Post'); 
    }

}

