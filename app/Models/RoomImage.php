<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{

    const PAGINATION_VALUE_ON_PAGE = 5;

    /**
     * Declare table
     *
     * @var string $table table name
     */
    protected $table = 'room_images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['room_id', 'image'];
 
    /**
     * Relationship belongsTo with room
     *
     * @return array
    */
    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id', 'id');
    }
    
    /**
     * Find Room Image from Room id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findRoomImage($id)
    {
        return $this->where('room_id', $id)->get();
    }

    /**
     * Edit Room Image from id
     *
     * @param int $id id
     *
     * @return array
    */
    public function findRoomId($id)
    {
        return $this->find($id)->room_id;
    }

    /**
     * Delete Room Image from id
     *
     * @param array $deleteImage Images
     *
     * @return array
    */
    public function deleteRoomImage($deleteImage)
    {
        $listImages = $this->whereIn('id', $deleteImage);
        foreach ($listImages->get() as $item) {
            $linkImage = Room::FOLDER_UPLOAD_ROOM.$item->image;
            if (file_exists($linkImage)) {
                unlink($linkImage);
            }
        }
        return $listImages->delete();
    }

    /**
     * Delete Room Images from id
     *
     * @param int $id Room Id
     *
     * @return array
    */
    public function deleteRoomImages($id)
    {
        $list = $this->select('image')
                     ->where('room_id', $id);
        foreach ($list->get() as $item) {
            unlink(Room::FOLDER_UPLOAD_ROOM.$item->image);
        }
        return $list->delete();
    }
}
