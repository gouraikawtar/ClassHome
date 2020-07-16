<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['title' , 'content', 'status'];

    public function comments(){
        return $this->hasMany('App\Comment'); 
    }

    public function files(){
        return $this->hasMany('App\File'); 
    }

    public function teachingClass(){
        return $this->belongsTo('App\TeachingClass'); 
    }

    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function group(){
        return $this->belongsTo('App\group');
    }

    public static function boot(){
        parent::boot();

        static::deleting(function (Post  $post) {
            $post->comments()->delete();
            $post->files()->delete();
        });
    }

}
