<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    const PAGINATION_VALUE_ON_PAGE = 5;
    const FOLDER_UPLOAD_SLIDE = 'upload/slide/';
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
    protected $fillable = ['image'];


    /**
     * Get List SLides with paginate
     *
     * @return array
    */
    public function getSlidesPaginate()
    {
        return $this->paginate(self::PAGINATION_VALUE_ON_PAGE);
    }

    /**
     * Delete slide from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function deleteSlide($id)
    {
        return $this->find($id)->delete();
    }

     /**
     * Add Slide to database
     *
     * @param array $request request
     *
     * @return array
    */
    public function addSlideImage($request)
    {
        return $this->create($request);
    }
}
