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
     * Relationship belongsToMany with serviceType
     *
     * @return array
    */
    public function serviceTypes()
    {
        return $this->belongsToMany('App\Model\Service_type', 'hotel_id');
    }

    /**
     * Relationship belongsToMany with services
     *
     * @return array
    */
    public function services()
    {
        return $this->belongsToMany('App\Model\Service');
    }

    /**
     * Relationship hasMany with room
     *
     * @return array
    */
    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    /**
     * Relationship hasMany with comment
     *
     * @return array
    */
    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }

    /**
     * Relationship belongsTo with city
     *
     * @return array
    */
    public function cities()
    {
        return $this->belongsTo('App\Model\City', 'city_id');
    }
}
