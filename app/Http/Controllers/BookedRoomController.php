<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookedRoom;
use App\Http\Requests\Admins\BookedRoomRequest;

class BookedRoomController extends Controller
{

    protected $bookedRoom;

    /**
     ** Create contructor.
     *
     * @param App\Models\BookedRoom $bookedRoom bookedRoom
     *
     * @return void
     */
    public function __construct(BookedRoom $bookedRoom)
    {
        $this->bookedRoom = $bookedRoom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookedRooms = $this->bookedRoom->getBookedRoom();
        return view('admin.booked_rooms.list_booked_room', ['bookedRooms' => $bookedRooms]);
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
        $bookedRoom = $this->bookedRoom->findBookedRoom($id);
        return view('admin.booked_rooms.edit_booked_room', ['bookedRoom' => $bookedRoom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Admins\BookedRoomRequest $request request
     * @param int                                        $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BookedRoomRequest $request, $id)
    {
        // Get data from view
        $data = $request->only(['status']);
        // Edit bokked room and show meassage
        $check = $this->bookedRoom->editBookedRoom($data, $id);
        if (!empty($check)) {
            return $this->redirectSuccess("booked-rooms.index", __('admin/booked_room.booked_room_edit.booked_room_edit_success'));
        }
        return $this->redirectError("booked-rooms.index", __('admin/booked_room.booked_room_edit.booked_room_edit_error'));
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
        $check = $this->bookedRoom->deleteBookedRoom($id);
        if ($check) {
            return $this->redirectSuccess("booked-rooms.index", __('admin/booked_room.booked_room_delete.booked_room_delete_success'));
        }
        return $this->redirectError("booked-rooms.index", __('admin/booked_room.booked_room_delete.booked_room_delete_error'));
    }
}
