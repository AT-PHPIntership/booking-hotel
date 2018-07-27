<?php

namespace App;

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
}
