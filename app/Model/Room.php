<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = ['id', 'user_id', 'hotel_id', 'room_type_id', 'image', 'status', 'descipt', 'price', 'discount'];
    
    public $timestamps = false;

    public function room_booked () {
        return $this->hasMany('App\Room');
    }

    public function room_type () {
        return $this->hasMany('App\Room_type');
    }

    public function hotel () {
        return $this->belongsTo('App\Hotel');
    }

}
