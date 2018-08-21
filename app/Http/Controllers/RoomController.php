<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\RoomImage;
use App\Http\Requests\Admins\RoomRequest;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    protected $hotel;
    protected $room;
    protected $roomType;
    protected $roomImage;

    /**
     ** Create contructor.
     *
     * @param Hotel     $hotel     hotel
     * @param Room      $room      room
     * @param RoomType  $roomType  room type
     * @param RoomImage $roomImage Images of room
     *
     * @return void
     */
    public function __construct(Hotel $hotel, Room $room, RoomType $roomType, RoomImage $roomImage)
    {
        $this->hotel = $hotel;
        $this->room = $room;
        $this->roomType = $roomType;
        $this->roomImage = $roomImage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = $this->room->getRoomsPaginate();
        return view('admin.rooms.list_room', ['rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = $this->hotel->getHotels();
        $roomTypes = $this->roomType->getRoomTypes();
        return view('admin.rooms.add_room', ['hotels' => $hotels, 'roomTypes' => $roomTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->only(['name', 'price', 'discount', 'descript', 'hotel_id', 'room_type_id']);
        $data['user_id'] = Auth::user()->id;
        $request->status == Room::RADIO_STATUS_VALUE_FROM_VIEW ? $data['status'] = true : $data['status'] = false;
        // Store image into ImageRoom
        $file = $request->file('image');
        foreach ($file as $item) {
            $name = $item->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists(Room::FOLDER_UPLOAD_ROOM.$image)) {
                $image = str_random(4)."_".$name;
            }
            $item->move(Room::FOLDER_UPLOAD_ROOM, $image);
            $imagesData[] = [
                'image' => $image,
            ];
        }
        $check = $this->room->addRoom($data, $imagesData);
        // Check create room
        if (!empty($check)) {
            return $this->redirectSuccess("rooms.index", __('admin/room.room_add.room_add_success'));
        }
        return $this->redirectError("rooms.index", __('admin/room.room_add.room_add_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = $this->room->findRoom($id);
        $roomImages = $this->roomImage->findRoomImage($id);
        $hotels = $this->hotel->getHotels();
        $roomTypes = $this->roomType->getRoomTypes();
        return view('admin.rooms.edit_room', ['room' => $room, 'roomImages' => $roomImages,'hotels' => $hotels, 'roomTypes' => $roomTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoomRequest $request request
     * @param int         $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $data = $request->only(['name', 'price', 'discount', 'descript', 'hotel_id', 'room_type_id']);
        $data['user_id'] = Auth::user()->id;
        $request->status == Room::RADIO_STATUS_VALUE_FROM_VIEW ? $data['status'] = true : $data['status'] = false;
        // Add Image for room
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            foreach ($file as $item) {
                $name = $item->getClientOriginalName();
                $image = str_random(4)."_".$name;
                while (file_exists(Room::FOLDER_UPLOAD_ROOM.$image)) {
                    $image = str_random(4)."_".$name;
                }
                $item->move(Room::FOLDER_UPLOAD_ROOM, $image);
                $imagesData[] = [
                    'image' => $image,
                ];
            }
        } else {
            $imagesData = null;
        }
        $check = $this->room->editRoom($data, $id, $imagesData);
        // Check edit room
        if (!empty($check)) {
            return $this->redirectSuccess("rooms.index", __('admin/room.room_edit.room_edit_success'));
        }
        return $this->redirectError("rooms.index", __('admin/room.room_edit.room_edit_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkImageRoom = $this->roomImage->deleteRoomImages($id);
        $checkRoom = $this->room->deleteRoom($id);
        if (!empty($checkRoom) && !empty($checkImageRoom)) {
            return $this->redirectSuccess("rooms.index", __('admin/room.room_delete.room_delete_success'));
        }
        return $this->redirectError("rooms.index", __('admin/room.room_delete.room_delete_error'));
    }
}
