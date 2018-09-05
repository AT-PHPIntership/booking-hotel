<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'hotel_services';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['hotel_id', 'service_id'];

    /**
     * Find Services Hotel from id Hotel
     *
     * @param int $hotelId hotel id
     *
     * @return array
    */
    public function findServicesHotel($hotelId)
    {
        return $this->select('service_id')->where('hotel_id', $hotelId)->get();
    }
}
