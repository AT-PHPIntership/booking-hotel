<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'comments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['user_id', 'content', 'hotel_id', 'rating_point'];
    
    /**
     * Relationship belongsTo with user
     *
     * @return array
    */
    public function users()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    /**
     * Relationship belongsTo with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Model\Hotel', 'hotel_id');
    }
}
