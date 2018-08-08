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
    const PAGINATION_VALUE_ON_PAGE = 5;

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

    /**
     * Get List Users
     *
     * @return array
    */
    public function getUsers()
    {
        return $this->paginate(User::PAGINATION_VALUE_ON_PAGE);
    }

    /**
     * Add User into database
     *
     * @param object $request request
     *
     * @return array
    */
    public function addUser($request)
    {
        return $this->create($request);
    }

    /**
     * Encode the password
     *
     * @param string $value value
     *
     * @return void
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Delete User from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteUser($id)
    {
        return $this->find($id)->delete();
    }
}
