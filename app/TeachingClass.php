<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingClass extends Model
{
    use SoftDeletes;
    
    public function teacher(){
        return $this->belongsTo('App\User');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function homeworks(){
        return $this->hasMany('App\Homework');
    }

    public function groups(){
        return $this->hasMany('App\Group');
    }

    public function students(){
        return $this->belongsToMany('App\User', 'class_subscriptions', 'teaching_class_id', 'user_id');
    }

    public static function boot(){
        parent ::boot() ;

        //to delete homeworks related to a teaching class
        static ::deleting(function(TeachingClass $teachingClass){
            $teachingClass->homeworks()->delete();
        });

        //to delete posts related to a teaching class
        static ::deleting(function(TeachingClass $teachingClass){
            $teachingClass->posts()->delete();
        });

        //to delete groups related to a teaching class
        static ::deleting(function(TeachingClass $teachingClass){
            $teachingClass->groups()->delete();
        });
        
        //to restore homeworks related to a teaching class
        static ::restoring(function(TeachingClass $teachingClass){
            $teachingClass->homeworks()->restore();
        });

        //to restore posts related to a teaching class
        static ::restoring(function(TeachingClass $teachingClass){
            $teachingClass->posts()->restore();
        });

        //to restore groups related to a teaching class
        static ::restoring(function(TeachingClass $teachingClass){
            $teachingClass->groups()->restore();
        });
    }
    
}
