<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Users\SearchHotelsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Hotel;
use App\Models\BookedRoom;
use Carbon\Carbon;

class HotelController extends ApiController
{
    protected $hotel;
    protected $bookedRoom;

    /**
     ** Create contructor.
     *
     * @param App\Models\Hotel      $hotel      hotel
     * @param App\Models\BookedRoom $bookedRoom bookedRoom
     *
     * @return void
     */
    public function __construct(Hotel $hotel, BookedRoom $bookedRoom)
    {
        $this->hotel = $hotel;
        $this->bookedRoom = $bookedRoom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $idRoomBooked = $this->bookedRoom->bookedSearch($now, $now);
        $hotels = $this->paginate($this->hotel->getFrontEndHotels($idRoomBooked));
        $hotels = $this->formatPaginate($hotels);
        return $this->showAll($hotels, Response::HTTP_OK);
    }

    /**
     * Display Hotels follow City
     *
     * @param SearchHotelsRequest $request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showHotelsFollowConditions(SearchHotelsRequest $request)
    {
        // Get data from view
        $data = $request->only(['city_id', 'date_checkin', 'date_checkout', 'people']);
        // Get hotels
        $idRoomBooked = $this->bookedRoom->bookedSearch($data['date_checkin'], $data['date_checkout']);
        $hotels = $this->paginate($this->hotel->getHotelsFollowConditions($idRoomBooked, $data['city_id'], $data['people']));
        $hotels = $this->formatPaginate($hotels);
        return $this->showAll($hotels, Response::HTTP_OK);
    }

    /**
     * Display Hotels follow City
     *
     * @param Request $request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showHotelsFilter(Request $request)
    {
        $data = $request->only(['city_id', 'date_checkin', 'date_checkout', 'people', 'price', 'star']);
        $idRoomBooked = $this->bookedRoom->bookedSearch($data['date_checkin'], $data['date_checkout']);
        $hotels = $this->paginate($this->hotel->getHotelsFilter($idRoomBooked, $data['people'], $data['star'], $data['price']));
        $hotels = $this->formatPaginate($hotels);
        return $this->showAll($hotels, Response::HTTP_OK);
    }
}
