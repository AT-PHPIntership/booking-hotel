<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_booked extends Model
{
    protected $table = 'room_bookeds';

    protected $fillable = ['id', 'user_id', 'room_id', 'date_in', 'date_out', 'status', 'notes'];
    
    public $timestamps = false;

    public function room () {
        return $this->belongsTo('App\Room', 'room_id');
    }
}
