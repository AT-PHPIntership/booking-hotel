<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_type extends Model
{
    protected $table = 'service_types';
    
    protected $fillable = ['id', 'hotel_id', 'service_id', 'user_id'];
    
    public $timestamps = false;

    public function hotel () {
        return $this->belongsToMany('App\Hotel');
    }

    public function service () {
        return $this->hasMany('App\Service');
    }
}
