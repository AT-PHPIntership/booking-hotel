<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = ['id', 'name', 'status', 'user_id'];
    
    public $timestamps = false;

    public function service_type () {
        return $this->belongsTo('App\Service_type');
    }

}
