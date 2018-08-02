<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\admin\RoomTypeRequest;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Get List Room Types
     *
     * @return array
    */
    public function getRoomTypes()
    {
        $list = $this->with('user')->paginate(RoomType::PAGINATION_VALUE_ON_PAGE);
        return $list;
    }

    /**
     * Add Room Type
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return array
    */
    public function addRoomType($request)
    {
        return $this->create($request);
    }

    /**
     * Delete Room Type
     *
     * @param int $id id
     *
     * @return array
    */
    public function delRoomType($id)
    {
        return $this->find($id)->delete();
    }
}
