<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
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
