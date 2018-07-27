<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_USER = 'admin';
    const NORMAL_USER = 'user';

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
