<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function State(){
        return $this->belongsTo('App\State');
    }
    public function Post(){
        return $this->belongsToMany('App\Post');
    }
}
