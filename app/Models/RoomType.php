<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;
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
    protected $fillable = ['user_id', 'name'];
    
    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * Relationship belongsTo with user
     *
     * @return array
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getRoomTypes()
    {
        $list = $this->with('user')->paginate(RoomType::PAGINATION_VALUE_ON_PAGE);
        return $list;
    }
}
