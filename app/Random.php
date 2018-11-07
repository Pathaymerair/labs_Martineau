<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Random extends Model
{
    public function Comment(){
        return $this->hasMany('App\Comment');
    }
}
