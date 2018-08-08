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
    protected $fillable = ['name', 'user_id'];

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
     * Relationship belongsTo with user
     *
     * @return array
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get List Service Types
     *
     * @return array
    */
    public function getServiceTypes()
    {
        return $this->with(['user'])->paginate(ServiceType::PAGINATION_VALUE_ON_PAGE);
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

    /**
     * Find Service Type from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findServiceType($id)
    {
        return $this->find($id);
    }
    
    /**
     * Edit Service Type from id
     *
     * @param object $request request
     * @param int    $id      id
     *
     * @return array
    */
    public function editServiceType($request, $id)
    {
        return $this->where('id', $id)->update($request);
    }

    /**
     * Delete Service Type from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteServiceType($id)
    {
        return $this->where('id', $id)->delete();
    }
}
