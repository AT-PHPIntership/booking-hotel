<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;

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
        return $this->belongsToMany('App\Models\Hotel', 'hotel_services', 'service_id', 'hotel_id');
    }

    /**
     * Relationship belongsTo with user
     *
     * @return array
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get List Services with out pagination
     *
     * @return array
    */
    public function getServicesPagination()
    {
        return $this->paginate(Service::PAGINATION_VALUE_ON_PAGE);
    }

    /**
     * Get List Services
     *
     * @return array
    */
    public function getServices()
    {
        return $this->all();
    }

    /**
     * Add Service into database
     *
     * @param object $request request
     *
     * @return array
    */
    public function addService($request)
    {
        return $this->create($request);
    }

    /**
     * Find service from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findService($id)
    {
        return $this->find($id);
    }

    /**
     * Edit service from id
     *
     * @param object $request request
     * @param int    $id      id
     *
     * @return array
    */
    public function editService($request, $id)
    {
        return $this->find($id)->update($request);
    }

    
    /**
     * Delete service from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteService($id)
    {
        return $this->find($id)->delete();
    }
}
