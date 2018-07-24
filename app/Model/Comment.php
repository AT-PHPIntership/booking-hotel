<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['id', 'user_id', 'content', 'hotel_id', 'rating_point'];
    
    public $timestamps = false;

    public function user () {
        return $this->belongsTo('App\User','user_id');
    }

    public function hotel () {
        return $this->belongsTo('App\Hotel','hotel_id');
    }

}
