<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function members(){
        return $this->belongsToMany('App\User'); 
    }
}
