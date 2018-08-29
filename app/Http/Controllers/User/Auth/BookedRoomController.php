<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\BookedRoom;
use App\Models\User;

class BookedRoomController extends ApiController
{
    protected $bookedRoom;
    protected $user;

    /**
     ** Create contructor.
     *
     * @param BookedRoom $bookedRoom bookedRoom
     * @param User       $user       user
     *
     * @return void
     */
    public function __construct(BookedRoom $bookedRoom, User $user)
    {
        $this->bookedRoom = $bookedRoom;
        $this->user = $user;
    }

    /**
     * Create new booking
     *
     * @param Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get data from view
        $data = $request->only(['room_id', 'date_in', 'date_out', 'notes']);
        $data['user_id'] = $this->user->findUserFromName($request['username'])->id;
        $check = $this->bookedRoom->createBookedRoom($data);
        if (!empty($check)) {
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(null, Response::HTTP_UNAUTHORIZED);
    }
}
