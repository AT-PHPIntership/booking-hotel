<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Controllers\User\ApiController;
use Symfony\Component\HttpFoundation\Response;

class CityController extends ApiController
{
    protected $city;

    /**
     ** Create contructor.
     *
     * @param City $city city
     *
     * @return void
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = $this->city->getFrontEndCitys();
        if ($citys) {
            return $this->showAll($citys, Response::HTTP_OK);    
        }
        return $this->errorResponse(__('user/home.city_unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
