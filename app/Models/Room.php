<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    const PAGINATION_VALUE_ON_PAGE = 5;
    const FOLDER_UPLOAD_ROOM = "upload/room/";
    const CREATED_ROOM_ID_INCREASE = 1;
    const RADIO_STATUS_VALUE_FROM_VIEW = "on";

    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'rooms';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['user_id', 'name', 'room_type_id', 'hotel_id', 'status', 'descript', 'price', 'discount'];

    /**
     * Relationship hasOne with roomBooked
     *
     * @return array
    */
    public function bookedRooms()
    {
        return $this->hasOne('App\Models\Room');
    }

    /**
     * Relationship belongsTo with roomBooked
     *
     * @return array
    */
    public function roomTypes()
    {
        return $this->belongsTo('App\Models\RoomType', 'room_type_id');
    }


    /**
     * Relationship belongsTo with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id');
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
     * Relationship hasMany with roomImage
     *
     * @return array
    */
    public function roomImage()
    {
        return $this->hasMany('App\Models\RoomImage', 'room_id', 'id');
    }

    /**
     * Relationship hasMany with bookedRoom
     *
     * @return array
    */
    public function bookedRoom()
    {
        return $this->hasMany('App\Models\BookedRoom');
    }

    /**
     * Get rooms with paginate
     *
     * @return array
    */
    public function getRoomsPaginate()
    {
        $list = $this->with(['roomTypes','hotel'])->paginate(Room::PAGINATION_VALUE_ON_PAGE);
        return $list;
    }

    /**
     * Find the last room id
     *
     * @return array
    */
    public function findLastIdRoom()
    {
        return $this->latest('id')->first()->id;
    }

    /**
     * Add Room into database
     *
     * @param object $data  data of room
     * @param object $image image of room
     *
     * @return array
    */
    public function addRoom($data, $image)
    {
        $room = $this->create($data);
        return $room->roomImage()->createMany($image);
    }

    /**
     * Find room from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findRoom($id)
    {
        return $this->find($id);
    }

    /**
     * Edit room from id
     *
     * @param object $data  data
     * @param int    $id    id
     * @param object $image image
     *
     * @return array
    */
    public function editRoom($data, $id, $image)
    {
        if ($image != null) {
            $this->find($id)->roomImage()->createMany($image);
        }
        return $this->find($id)->update($data);
    }

    /**
     * Delete room from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteRoom($id)
    {
        return $this->find($id)->delete();
    }
}
