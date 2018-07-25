<?php

namespace App;

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
    protected $fillable = ['id', 'name', 'status', 'user_id'];
    
    public $timestamps = false;
    
    /**
     * Relationship belongsTo with serviceType
     *
     * @return array
    */
    public function serviceType()
    {
        return $this->belongsTo('App\ServiceType');
    }
}
