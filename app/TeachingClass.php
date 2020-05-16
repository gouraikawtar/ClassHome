<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingClass extends Model
{
    use SoftDeletes;
    
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
