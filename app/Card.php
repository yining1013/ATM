<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function Records(){
        return $this->hasMany('App\Record');
    }
}
