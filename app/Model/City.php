<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
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
    public function place()
    {
        return $this->hasMany('App\Model\Place');
    }
    
    /**
     * Relationship hasMany with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->hasMany('App\Hotel');
    }
}
