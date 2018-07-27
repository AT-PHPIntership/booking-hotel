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
    protected $fillable = ['city_id', 'name', 'image', 'descript', 'user_id'];
    
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
