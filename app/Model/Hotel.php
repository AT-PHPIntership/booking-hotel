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
    protected $fillable = ['id', 'city_id', 'name', 'address', 'number_star', 'status', 'descript', 'user_id'];
    
    public $timestamps = false;
    
    /**
     * Relationship belongsToMany with serviceType
     *
     * @return array
    */
    public function serviceType()
    {
        return $this->belongsToMany('App\Service_type', 'hotel_id');
    }

    /**
     * Relationship hasMany with room
     *
     * @return array
    */
    public function room()
    {
        return $this->hasMany('App\Room', 'hotel_id');
    }

    /**
     * Relationship hasMany with comment
     *
     * @return array
    */
    public function comment()
    {
        return $this->hasMany('App\Comment', 'hotel_id');
    }

    /**
     * Relationship belongsTo with city
     *
     * @return array
    */
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }
}
