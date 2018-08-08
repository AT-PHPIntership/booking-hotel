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
     * Get List Service Type no using pagination
     *
     * @return array
    */
    public function getListServiceType()
    {
        return $this->select("id", "name")->get();
    }
}
