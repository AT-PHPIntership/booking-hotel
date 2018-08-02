<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class City extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;

    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'cities';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['city', 'country'];
    
    /**
     * Relationship hasMany with place
     *
     * @return array
    */
    public function places()
    {
        return $this->hasMany('App\Models\Place');
    }
    
    /**
     * Relationship hasMany with hotel
     *
     * @return array
    */
    public function hotels()
    {
        return $this->hasMany('App\Models\Hotel');
    }

    /**
     * Get List city
     *
     * @return array
    */
    public function getCities()
    {
        $cities = $this->paginate(City::PAGINATION_VALUE_ON_PAGE);
        return $cities;
    }

    /**
     * Add City
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return array
    */
    public function addCity($request)
    {
        return $this->create($request);
    }
}
