<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    public function Project(){
        return $this->hasMany('App\Project');
    }
    public function Service(){
        return $this->hasMany('App\Service');
    }
}
