<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachingClass extends Model
{
    //
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function homeworks(){
        return $this->hasMany('App\Homework');
    }

    public function groups(){
        return $this->hasMany('App\Group');
    }
}
