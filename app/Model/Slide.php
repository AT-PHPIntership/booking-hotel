<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'slides';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['id', 'name', 'image', 'descript', 'link'];
    
    public $timestamps = false;
}
