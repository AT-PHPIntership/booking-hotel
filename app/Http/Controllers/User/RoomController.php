<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\BookedRoom;
use Carbon\Carbon;

class RoomController extends ApiController
{
    protected $room;
    protected $bookedRoom;

    /**
     ** Create contructor.
     *
     * @param App\Models\Room       $room       room
     * @param App\Models\BookedRoom $bookedRoom bookedRoom
     *
     * @return void
     */
    public function __construct(Room $room, BookedRoom $bookedRoom)
    {
        $this->room = $room;
        $this->bookedRoom = $bookedRoom;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get data from view
        $data = $request->only(['date_checkin', 'date_checkout', 'id']);
        $idRoomBooked = $this->bookedRoom->bookedSearch($data['date_checkin'], $data['date_checkout']);
        $rooms = $this->paginate($this->room->getFrontEndRooms($data, $idRoomBooked));
        $rooms = $this->formatPaginate($rooms);
        return $this->showAll($rooms, Response::HTTP_OK);
    }
}
