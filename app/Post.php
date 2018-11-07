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
    public function Comment(){
        return $this->hasMany('App\Comment');
    }
    public function commentcount(){
        return $this->comment->where('state_id', 2);
        // return $this->comment->count();
        
        
    }
    public function Categorie(){
        return $this->belongsToMany('App\Categorie');
    }
    public function Tag(){
        return $this->belongsToMany('App\Tag');
    }
}
