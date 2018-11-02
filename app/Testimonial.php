<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public function Client(){
        return $this->belongsTo('App\Client');
    }
    public function State(){
        return $this->belongsTo('App\State');
    }
}
