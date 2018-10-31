<?php

namespace App;
use App\State;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function State(){
        return $this->belongsTo('App\State');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
}
