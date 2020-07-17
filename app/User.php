<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'gender', 'email', 'phone_number', 'password', 'role'
    ];


    public function posts(){
        return $this->hasMany('App\Post'); 
    }

    public function comments(){
        return $this->hasMany('App\Comment'); 
    }

    public function groups(){
        return $this->belongsToMany('App\Group', 'group_junctions', 'user_id', 'group_id'); 
    }

    public function leadingGroups(){
        return $this->hasMany('App\Group'); 
    }

    public function subscriptions(){
        return $this->belongsToMany('App\TeachingClass', 'class_subscriptions', 'user_id', 'teaching_class_id');
    }


    public static function boot(){
        parent::boot();

        static::deleting(function (User  $user) {
            $user->posts()->delete();
            $user->comments()->delete();
            $user->leadingGroups()->delete();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
