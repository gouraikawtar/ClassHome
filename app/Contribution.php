<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribution extends Model
{
    use SoftDeletes;

    public function homework(){
        return $this->belongsTo('App\Homework');
    }

    public function creator(){
        return $this->belongsTo('App\User');
    }

    public function joinedDocuments(){
        return $this->hasMany('App\ContributionDocument');
    }
}
