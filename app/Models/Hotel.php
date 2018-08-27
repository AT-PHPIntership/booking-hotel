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
        return $this->belongsToMany('App\Models\Service', 'hotel_service', 'hotel_id', 'service_id');
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
        $list = $this->all();
        return $list;
    }

    /**
     * Add Hotel to database
     *
     * @param object $request request
     *
     * @return array
    */
    public function addHotel($request)
    {
        return $this->create($request);
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
     * @param object $request request
     * @param int    $id      id
     *
     * @return array
    */
    public function editHotel($request, $id)
    {
        return $this->where('id', $id)->update($request);
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
        return $this->where('id', $id)->delete();
    }

    /**
     * Get List Hotels without paginate
     *
     * @return array
    */
    public function getFrontEndHotels()
    {
        \DB::enableQueryLog();
        $hotel = new Hotel;
        $query = $hotel
                ->select('rooms.hotel_id', 'cities.*', 'hotels.*', \DB::raw('count(rooms.id) as total_room'))
                ->join('cities', 'cities.id', '=', 'hotels.city_id')
                ->join('rooms', 'rooms.hotel_id', '=', 'hotels.id')
                ->LeftJoin(\DB::raw('(select * from booked_rooms where DATE(booked_rooms.date_in) = DATE(?)) as booked '), 'booked.room_id', '=', 'rooms.id')
                ->addBinding(now())
                ->where('hotels.status','=', self::HOTEL_STATUS_ENABLE)
                ->where('rooms.status','=', Room::ROOM_STATUS_ENABLE)
                ->whereNull('booked.status')
                ->groupby('hotels.name');
        return $query->get();
    }

    /**
     * Get List Hotels follow conditions from frontend
     *
     * @param array $data Data from form request
     *
     * @return array
    */
    public function getHotelsByConditions($data)
    {
        if($data){
            \DB::enableQueryLog();
            $hotel = new Hotel;
            $query = $hotel
                    ->select('rooms.hotel_id', 'cities.*', 'hotels.*', \DB::raw('count(rooms.id) as total_room'))
                    ->join('cities', 'cities.id', '=', 'hotels.city_id')
                    ->join('rooms', 'rooms.hotel_id', '=', 'hotels.id')
                    ->LeftJoin(\DB::raw('(select * from booked_rooms where DATE(booked_rooms.date_in) > DATE('.$data['date_checkout'].') or DATE(booked_rooms.date_out) < DATE('.$data['date_checkin'].')) as booked '), 'booked.room_id', '=', 'rooms.id')
                    // ->addBinding(date($data['date_checkout']))
                    // ->addBinding(date($data['date_checkin']))
                    ->where('hotels.city_id','=', $data['city_id'])
                    ->where('rooms.status','=', Room::ROOM_STATUS_ENABLE)
                    ->where('hotels.status','=', self::HOTEL_STATUS_ENABLE)
                    ->whereNull('booked.status')
                    ->groupby('hotels.name')
                    ->having('total_room', '>=', $data['people'])
                    ->get();
            return $query;
        } else {
            return $this->getFrontEndHotels();
        }
    }
}
