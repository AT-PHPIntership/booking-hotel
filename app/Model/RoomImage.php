<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'room_images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['hotel_id', 'room_id', 'image'];
 
    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function rooms()
    {
        return $this->belongsTo('App\Model\Room', 'room_id');
    }
}
