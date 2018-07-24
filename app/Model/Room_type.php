<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    protected $table = 'room_types';

    protected $fillable = ['id', 'user_id', 'hotel_id', 'descript'];
    
    public $timestamps = false;

    public function room () {
        return $this->belongsTo('App\Room', 'room_type_id');
    }
}
