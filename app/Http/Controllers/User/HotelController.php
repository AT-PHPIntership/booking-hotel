<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends ApiController
{
    protected $hotel;

    /**
     ** Create contructor.
     *
     * @param App\Models\Hotel $hotel hotel
     *
     * @return void
     */
    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = $this->paginate($this->hotel->getFrontEndHotels());
        $hotels = $this->formatPaginate($hotels);
        return $this->showAll($hotels, Response::HTTP_OK);
    }

    /**
     * Display Hotels follow City
     *
     * @return \Illuminate\Http\Response
     */
    public function showHotelsFollowConditions(Request $request)
    {
        // Get data from view
        $data = $request->only(['city_id', 'date_checkin', 'date_checkout', 'people']);
        // Get hotels
        $hotels = $this->paginate($this->hotel->getHotelsByConditions($data));
        $hotels = $this->formatPaginate($hotels);
        return $this->showAll($hotels, Response::HTTP_OK);
    }
}
