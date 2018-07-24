<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_image extends Model
{
    protected $table = 'room_images';

    protected $fillable = ['id', 'hotel_id', 'room_id', 'image'];
    
    public $timestamps = false;

    public function room () {
        return $this->belongsTo('App\Room', 'room_id');
    }
}
