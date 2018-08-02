<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\Admins\RoomTypeRequest;
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
     * Get Room Type by $id id
     *
     * @param int $id id
     *
     * @return object
    */
    public function getRoomType($id)
    {
        $roomType = $this->with('user')->find($id);
        return $roomType;
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
    /**
     * Edit Room Type
     *
     * @param array $where where
     * @param array $data  data
     *
     * @return array
    */
    public function editRoomType($where, $data)
    {
        return $this->where($where)->update($data);
    }
}
