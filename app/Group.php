<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['name', 'teaching_class_id'];

    public function users(){
        return $this->belongsToMany('App\User', 'group_junctions', 'group_id', 'user_id'); 
    }

    public function responsible(){
        return $this->belongsTo('App\User'); 
    }

    public function posts(){
        return $this->hasMany('App\Post'); 
    }

    public function teachingClass(){
        return $this->belongsTo('App\TeachingClass');
    }

    
    public static function boot(){
        parent::boot();

        static::deleting(function (Group  $group) {
            $group->posts()->delete();
        });
    }

}
