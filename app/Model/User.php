<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'users';
    
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
        return $this->hasMany('App\Model\Card');
    }

    /**
     * Relationship belongsTo with comment
     *
     * @return array
    */
    public function comments()
    {
        return $this->belongsTo('App\Model\Comment', 'id', 'user_id');
    }
}
