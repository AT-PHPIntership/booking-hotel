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
     * Relationship hasMany with service
     *
     * @return array
    */
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
