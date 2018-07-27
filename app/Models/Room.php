<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'rooms';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['user_id', 'room_type_id', 'image', 'status', 'descipt', 'price', 'discount'];

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function bookRooms()
    {
        return $this->hasMany('App\Models\Room');
    }

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function roomTypes()
    {
        return $this->hasMany('App\Models\RoomType');
    }
}
