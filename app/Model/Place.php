<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'places';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['id', 'city_id', 'name', 'image', 'descript', 'user_id'];
    
    public $timestamps = false;
    
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
