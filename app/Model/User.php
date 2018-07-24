<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'username', 'password', 'email', 'address', 'phone', 'role'];
    
    public $timestamps = false;
    
    public function card () {
        return $this->hasMany('App\Card', 'id', 'user_id');
    }
    public function comment () {
        return $this->belongsTo('App\Comment', 'id', 'user_id');
    }
}
