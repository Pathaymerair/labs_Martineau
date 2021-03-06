<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profil;
use App\imageUser;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Role(){
        return $this->belongsTo('App\Role');
    }
    public function Profil(){
        return $this->hasOne('App\Profil', 'user_id');
    }
    public function ImageUser(){
        return $this->belongsTo('App\imageUser', 'image_id', 'id');
    }
    public function Posts(){
        return $this->hasMany('App\Post', 'user_id');
    }
    public function Comment(){
        return $this->hasMany('App\Comment');
    }
    public function Categorie(){
        return $this->hasMany('App\Categorie');
    }
    public function Tag(){
        return $this->hasMany('App\Tag');
    }
    public function State(){
        return $this->belongsTo('App\State');
    }
}
