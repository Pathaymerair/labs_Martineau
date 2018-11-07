<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function State(){
        return $this->belongsTo('App\State');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Post(){
        return $this->belongsTo('App\Post');
    }
    public function Random(){
        return $this->belongsTo('App\Random');
    }
}
