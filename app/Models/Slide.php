<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    const PAGINATION_VALUE_ON_PAGE = 5;

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
    protected $fillable = ['name', 'image', 'descript'];

    /**
     * Get List Slides to display
     *
     * @return array
    */
    public function getFrontEndSlides()
    {
        return $this->select('image')
                    ->limit(self::PAGINATION_VALUE_ON_PAGE)->get();
    }
}
