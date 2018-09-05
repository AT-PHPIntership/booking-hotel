<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\BookedRoom;
use Illuminate\Support\Carbon;

class Hotel extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;
    const FOLDER_UPLOAD_HOTEL = "upload/hotel/";
    const HOTEL_STATUS_ENABLE = 1;
    const HOTEL_STATUS_DISABLE = 0;

    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'hotels';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['city_id', 'name', 'address', 'number_star', 'status', 'descript', 'image', 'user_id'];

    /**
     * Relationship belongsToMany with services
     *
     * @return array
    */
    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'hotel_services', 'hotel_id', 'service_id');
    }

    /**
     * Relationship hasMany with hotel services
     *
     * @return array
    */
    public function hotelServices()
    {
        return $this->hasMany('App\Models\HotelService', 'hotel_id', 'id');
    }

    /**
     * Relationship hasMany with rooms
     *
     * @return array
    */
    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }

    /**
     * Relationship hasMany with comment
     *
     * @return array
    */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Relationship belongsTo with city
     *
     * @return array
    */
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
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
     * Get List Hotels with paginate
     *
     * @return array
    */
    public function getHotelsPaginate()
    {
        $list = $this->with(['user', 'city'])->paginate(self::PAGINATION_VALUE_ON_PAGE);
        return $list;
    }

    /**
     * Get List Hotels without paginate
     *
     * @return array
    */
    public function getHotels()
    {
        return $this->all();
    }

    /**
     * Add Hotel to database
     *
     * @param object $request  request
     * @param array  $services services
     *
     * @return array
    */
    public function addHotel($request, $services)
    {
        $hotel = $this->create($request);
        $hotel->services()->attach($services);
        return $hotel;
    }

    /**
     * Find hotel from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findHotel($id)
    {
        return $this->where('id', $id)->first();
    }

    /**
     * Edit hotel from id
     *
     * @param object $request  request
     * @param int    $id       id
     * @param array  $services services
     *
     * @return array
    */
    public function editHotel($request, $id, $services)
    {
        $this->where('id', $id)->update($request);
        $hotel = $this->find($id);
        $hotel->services()->detach();
        $hotel->services()->attach($services);
        return $hotel;
    }

    /**
     * Delete Hotel from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteHotel($id)
    {
        $hotel = $this->find($id);
        $hotel->services()->detach();
        return $hotel->delete();
    }

    /**
     * Get List Hotels for front end
     *
     * @param int $idRoomBooked id of room
     *
     * @return array
    */
    public function getFrontEndHotels($idRoomBooked)
    {
        \DB::enableQueryLog();
        $hotel = new Hotel;
        $query = $hotel
                ->select('rooms.hotel_id', 'cities.*', 'hotels.*', \DB::raw('count(rooms.id) as total_room'))
                ->join('cities', 'cities.id', '=', 'hotels.city_id')
                ->join('rooms', function ($join) use ($idRoomBooked) {
                    $join->on('rooms.hotel_id', '=', 'hotels.id');
                    $join->whereNotIn('rooms.id', $idRoomBooked);
                })
                ->where('hotels.status', '=', self::HOTEL_STATUS_ENABLE)
                ->where('rooms.status', '=', Room::ROOM_STATUS_ENABLE)
                ->groupby('hotels.name')
                ->get();
        return $query;
    }

    /**
     * Get List Hotels with conditions
     *
     * @param int $idRoomBooked id of room
     * @param int $city         city
     * @param int $people       people visit
     *
     * @return array
    */
    public function getHotelsFollowConditions($idRoomBooked, $city, $people)
    {
        \DB::enableQueryLog();
        $hotel = new Hotel;
        $query = $hotel
                ->select('rooms.hotel_id', 'cities.*', 'hotels.*', \DB::raw('count(rooms.id) as total_room'))
                ->join('cities', 'cities.id', '=', 'hotels.city_id')
                ->join('rooms', function ($join) use ($idRoomBooked) {
                    $join->on('rooms.hotel_id', '=', 'hotels.id');
                    $join->whereNotIn('rooms.id', $idRoomBooked);
                })
                ->where('hotels.city_id', "=", $city)
                ->where('hotels.status', '=', self::HOTEL_STATUS_ENABLE)
                ->where('rooms.status', '=', Room::ROOM_STATUS_ENABLE)
                ->groupby('hotels.name')
                ->having('total_room', ">=", $people)
                ->get();
        return $query;
    }

    /**
     * Get List Hotels with conditions
     *
     * @param int   $idRoomBooked id of room
     * @param int   $people       people
     * @param array $star         number star of hotel
     * @param array $price        price range of room
     *
     * @return array
    */
    public function getHotelsFilter($idRoomBooked, $people, $star, $price)
    {
        \DB::enableQueryLog();
        $hotel = new Hotel;
        $query = $hotel
                ->select('rooms.hotel_id', 'cities.*', 'hotels.*', \DB::raw('count(rooms.id) as total_room'))
                ->join('cities', 'cities.id', '=', 'hotels.city_id')
                ->join('rooms', function ($join) use ($idRoomBooked, $price) {
                    $join->on('rooms.hotel_id', '=', 'hotels.id');
                    $join->whereNotIn('rooms.id', $idRoomBooked)
                        ->whereBetween('rooms.price', $price);
                })
                ->whereIn('hotels.number_star', $star)
                ->where('hotels.status', '=', self::HOTEL_STATUS_ENABLE)
                ->where('rooms.status', '=', Room::ROOM_STATUS_ENABLE)
                ->groupby('hotels.name')
                ->having('total_room', ">=", $people)
                ->get();
        return $query;
    }
}
