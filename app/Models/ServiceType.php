<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;

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
    protected $fillable = ['name', 'user_id', 'hotel_id', 'service_id'];

    /**
     * Relationship hasMany with service
     *
     * @return array
    */
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    /**
     * Get List Service Types
     *
     * @return array
    */
    public function getServiceTypes()
    {
        return $this->paginate(ServiceType::PAGINATION_VALUE_ON_PAGE);
    }

    /**
     * Add Service Type into database
     *
     * @param object $request request
     *
     * @return array
    */
    public function addServiceType($request)
    {
        return $this->create($request);
    }

}
