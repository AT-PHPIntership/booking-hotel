<?php

namespace App\Models;

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
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Relationship belongsTo with hotel
     *
     * @return array
    */
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id');
    }

    /**
     * Create comment
     *
     * @param array $data data
     *
     * @return array
    */
    public function addComment($data)
    {
        return $this->create($data);
    }
}
