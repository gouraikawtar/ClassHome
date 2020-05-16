<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    use SoftDeletes;
    
    public function homeworkDocs(){
        return $this->hasMany('App\HomeworkDocument');
    }

    public function teachingClass(){
        return $this->belongsTo('App\TeachingClass');
    }

    public function creator(){
        return $this->belongsTo('App\User');
    }
}
