<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = ['id', 'city_id', 'name', 'address', 'number_star', 'status', 'descript', 'user_id'];
    
    public $timestamps = false;

    public function service_type () {
        return $this->belongsToMany('App\Service_type','hotel_id');
    }

    public function room () {
        return $this->hasMany('App\Room','hotel_id');
    }

    public function comment () {
        return $this->hasMany('App\Comment','hotel_id');
    }

    public function city () {
        return $this->belongsTo('App\City','city_id');
    }
}
