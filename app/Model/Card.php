<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    
    $table->increments('id');
        protected $table = 'cards';
        
        protected $fillable = ['id', 'user_id', 'card_type', 'card_code'];

        public function user () {
            return $this->belongsTo('App\User', 'user_id', 'id');
        }
    }
