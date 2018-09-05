<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Admins\BookedRoomRequest;

class BookedRoom extends Model
{

    const PAGINATION_VALUE_ON_PAGE = 5;
    const BOOKED_ROOM_STATUS_ENABLE = 1;
    const BOOKED_ROOM_STATUS_DISABLE = 0;

    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'booked_rooms';
    
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
        return $this->belongsTo('App\Models\Room', 'room_id');
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
     * Get List Booked Room
     *
     * @return array
    */
    public function getBookedRoom()
    {
        return $this->with(['user', 'room'])->orderBy('id', 'desc')->paginate(BookedRoom::PAGINATION_VALUE_ON_PAGE);
    }


    /**
     * Find Booked Room from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findBookedRoom($id)
    {
        return $this->find($id);
    }


    /**
     * Create Booked Room from id
     *
     * @param object $request request
     *
     * @return array
    */
    public function createBookedRoom($request)
    {
        $request['status'] = self::BOOKED_ROOM_STATUS_DISABLE;
        return $this->create($request);
    }

    /**
     * Edit Booked Room from id
     *
     * @param object $request request
     * @param int    $id      id
     *
     * @return array
    */
    public function editBookedRoom($request, $id)
    {
        return $this->find($id)->update($request);
    }

    /**
     * Delete Booked Room from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteBookedRoom($id)
    {
        return $this->find($id)->delete();
    }

    /**
     * Find Rooms are booked
     *
     * @param date $startDay start day
     * @param date $endDay   end day
     *
     * @return array
    */
    public function bookedSearch($startDay, $endDay)
    {
        $roomBookedList = $this->select('room_id')
                                ->where(function ($query) use ($startDay, $endDay) {
                                    $query->whereDate('date_in', '<=', $endDay)
                                        ->whereDate('date_in', '>=', $startDay);
                                })->orWhere(function ($query) use ($startDay, $endDay) {
                                    $query->whereDate('date_out', '<=', $endDay)
                                        ->whereDate('date_out', '>=', $startDay);
                                })
                                ->get();
        $idRoomBooked = [];
        foreach ($roomBookedList as $item) {
            $idRoomBooked[] = $item->room_id;
        }
        return $idRoomBooked;
    }

    /**
     * Find Rooms user has id booked
     *
     * @param int $userId user of id
     *
     * @return array
    */
    public function bookedFindFollowUser($userId)
    {
        return $this->with(['room.hotel', 'room.roomTypes', 'room.roomImage'])->where('user_id', $userId)->orderBy('id', 'desc')->get();
    }
}
