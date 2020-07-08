<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassSubscription extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id' , 'teaching_class_id'];
}
