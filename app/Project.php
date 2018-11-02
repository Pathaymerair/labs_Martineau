<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Icon;

class Project extends Model
{
    public function Icon(){
        return $this->belongsTo('App\Icon');
    }

    public function State(){
        return $this->belongsTo('App\State');
    }
}
