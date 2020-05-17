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

    public static function boot(){
        parent ::boot() ;

        //to delete joined documents related to a contribution
        static ::deleting(function(Contribution $contribution){
            $contribution->joinedDocuments()->delete();
        });

        //to restore joined documents related to a contribution
        static ::restoring(function(Contribution $contribution){
            $contribution->joinedDocuments()->restore();
        });

    }
}
