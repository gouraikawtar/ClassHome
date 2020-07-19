<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSubscription extends Model
{
    protected $fillable = ['user_id' , 'teaching_class_id'];
}
