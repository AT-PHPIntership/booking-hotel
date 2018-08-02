<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;
    const FOLDER_UPLOAD_HOTEL = "upload/hotel/";
    
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
     * Get List Hotels
     *
     * @return array
    */
    public function getHotels()
    {
        $list = $this->with(['user', 'city'])->paginate(Hotel::PAGINATION_VALUE_ON_PAGE);
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
}
