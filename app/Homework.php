<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    use SoftDeletes;
    
    public function joinedDocuments(){
        return $this->hasMany('App\HomeworkDocument');
    }

    public function contributions(){
        return $this->hasMany('App\Contribution');
    }

    public function teachingClass(){
        return $this->belongsTo('App\TeachingClass');
    }

    public function creator(){
        return $this->belongsTo('App\User');
    }
}
