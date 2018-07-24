<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel_image extends Model
{
    protected $table = 'hotel_images';

    protected $fillable = ['id', 'hotel_id', 'image'];
    
    public $timestamps = false;

    public function hotel () {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
