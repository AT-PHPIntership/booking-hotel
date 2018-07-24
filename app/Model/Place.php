<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    
    protected $fillable = ['id', 'city_id', 'name', 'image', 'descript', 'user_id'];
    
    public $timestamps = false;

    public function city () {
        return $this->belongsTo('App\City', 'city_id');
    }
}
