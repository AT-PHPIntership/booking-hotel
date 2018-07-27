<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
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
}
