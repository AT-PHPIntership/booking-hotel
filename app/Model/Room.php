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
    protected $fillable = ['id', 'user_id', 'hotel_id', 'room_type_id', 'image', 'status', 'descipt', 'price', 'discount'];
    
    public $timestamps = false;

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function roomBooked()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function roomType()
    {
        return $this->hasMany('App\RoomType');
    }

    /**
     * Relationship hasMany with roomBooked
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
