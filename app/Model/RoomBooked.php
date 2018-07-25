<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBooked extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'room_bookeds';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['user_id', 'room_id', 'date_in', 'date_out', 'status', 'notes'];
    
    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function room()
    {
        return $this->belongsTo('App\Model\Room', 'room_id');
    }
}
