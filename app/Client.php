<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function State(){
        return $this->belongsTo('App\State');
    }
}
