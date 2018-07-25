<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'cards';

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['id', 'user_id', 'card_type', 'card_code'];
    
    /**
     * Relationship belongsTo with user
     *
     * @return array
    */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
