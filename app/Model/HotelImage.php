<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'hotel_images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['id', 'hotel_id', 'image'];
    
    public $timestamps = false;
    
    /**
     * Relationship belongsTo with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
