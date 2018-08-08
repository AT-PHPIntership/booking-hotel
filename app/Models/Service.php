<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['name', 'service_type_id', 'status', 'user_id'];

    /**
     * Relationship belongsTo with serviceType
     *
     * @return array
    */
    public function serviceType()
    {
        return $this->belongsTo('App\Models\ServiceType', 'service_type_id');
    }

    /**
     * Relationship belongsToMany with hotel
     *
     * @return array
    */
    public function hotels()
    {
        return $this->belongsToMany('App\Models\Hotel', 'hotel_service', 'service_id', 'hotel_id');
    }
}
