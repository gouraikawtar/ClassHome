<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeworkDocument extends Model
{
    use SoftDeletes;

    public function homework(){
        return $this->belongsTo('App\Homework');
    } 
}
