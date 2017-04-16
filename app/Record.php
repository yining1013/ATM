<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    public function card(){
        $this->belongsTo('App\Card');
    }
}
