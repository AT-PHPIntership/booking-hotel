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
    protected $fillable = ['id', 'user_id', 'hotel_id', 'descript'];
    
    public $timestamps = false;

    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function room()
    {
        return $this->belongsTo('App\Room', 'room_type_id');
    }
}
