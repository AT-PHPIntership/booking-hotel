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
    protected $fillable = ['id', 'username', 'password', 'email', 'address', 'phone', 'role'];
    
    public $timestamps = false;
    
    /**
     * Relationship hasMany with card
     *
     * @return array
    */
    public function card()
    {
        return $this->hasMany('App\Card', 'id', 'user_id');
    }

    /**
     * Relationship belongsTo with comment
     *
     * @return array
    */
    public function comment()
    {
        return $this->belongsTo('App\Comment', 'id', 'user_id');
    }
}
