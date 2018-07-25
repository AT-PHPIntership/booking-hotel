<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'service_types';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['hotel_id', 'service_id', 'user_id'];

    /**
     * Relationship belongsToMany with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsToMany('App\Model\Hotel');
    }

    /**
     * Relationship hasMany with service
     *
     * @return array
    */
    public function service()
    {
        return $this->hasMany('App\Model\Service');
    }
}
