<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function Icon(){
        return $this->belongsTo('App\Icon');
    }

    public function State(){
        return $this->belongsTo('App\State');
    }
}
