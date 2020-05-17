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

    public static function boot(){
        parent ::boot() ;

        //to delete joined documents related to a homework
        static ::deleting(function(Homework $homework){
            $homework->joinedDocuments()->delete();
        });

        //to delete contributions related to a homework
        static ::deleting(function(Homework $homework){
            $homework->contributions()->delete();
        });

        //to restore joined document related to a homework
        static ::restoring(function(Homework $homework){
            $homework->joinedDocuments()->restore();
        });

        //to restore contributions related to a homework
        static ::restoring(function(Homework $homework){
            $homework->contributions()->restore();
        });

    }
}
