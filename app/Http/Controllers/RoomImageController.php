<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomImage;
use App\Models\Room;

class RoomImageController extends Controller
{
    protected $roomImage;
    /**
     ** Create contructor.
     *
     * @param RoomType $roomImage roomImage
     *
     * @return void
     */
    public function __construct(RoomImage $roomImage)
    {
        $this->roomImage = $roomImage;
    }

    /**
     ** List room images follow Room id
     *
     * @param int $id Room Id
     *
     * @return void
     */
    public function listRoomImage($id)
    {
        $roomImages = $this->roomImage->getRoomImagesPaginate($id);
        return view('admin.room_images.list_room_image', ['roomImages' => $roomImages]);
    }

    /**
     ** Delete room image follow id
     *
     * @param int $id Image Id
     *
     * @return void
     */
    public function deleteRoomImage($id)
    {
        $idHotel = $this->roomImage->findRoomId($id);
        $check = $this->roomImage->deleteRoomImage($id);
        if ($check) {
            return redirect()->route('room-images', ['id' => $idHotel])->with(['status'=> 'success', 'message' =>  __('admin/room.room_delete.room_delete_success')]);
        }
        return redirect()->route('room-images', ['id' => $idHotel])->with(['status'=> 'error', 'message' =>  __('admin/room.room_delete.room_delete_success')]);
    }
}
