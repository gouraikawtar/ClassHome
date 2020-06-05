<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubscription extends Model
{
    protected $fillable = ['user_id' , 'teaching_class_id'];
}
