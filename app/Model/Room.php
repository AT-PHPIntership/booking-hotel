<?php

namespace App;

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
    protected $fillable = ['user_id', 'hotel_id', 'room_type_id', 'image', 'status', 'descipt', 'price', 'discount'];

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function roomBooked()
    {
        return $this->hasMany('App\Model\Room');
    }

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function roomType()
    {
        return $this->hasMany('App\Model\RoomType');
    }

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Model\Hotel', 'hotel_id');
    }
}
