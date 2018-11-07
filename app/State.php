<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function post(){
        return $this->hasMany('App\Post');
    }
    public function tag(){
        return $this->hasMany('App\Tag');
    }
    public function Categorie(){
        return $this->hasMany('App\Categorie');
    }
}
