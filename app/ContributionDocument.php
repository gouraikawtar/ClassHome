<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContributionDocument extends Model
{
    use SoftDeletes;

    public function contribution(){
        return $this->belongsTo('App\Contribution');
    }
}
