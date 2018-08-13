<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\Admins\BookedRoomRequest;

class BookedRoom extends Model
{

    const PAGINATION_VALUE_ON_PAGE = 5;

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
        return $this->with(['user', 'room'])->paginate(BookedRoom::PAGINATION_VALUE_ON_PAGE);
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
}
