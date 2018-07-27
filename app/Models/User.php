<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['username', 'password', 'address', 'phone', 'email', 'role'];

    /**
     * Relationship hasMany with card
     *
     * @return array
    */
    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }

    /**
     * Relationship belongsTo with comment
     *
     * @return array
    */
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment', 'user_id');
    }
}