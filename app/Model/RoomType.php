<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'room_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['user_id', 'hotel_id', 'descript'];
    
    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function rooms()
    {
        return $this->belongsTo('App\Model\Room');
    }
}
