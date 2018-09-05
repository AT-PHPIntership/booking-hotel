<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelService;
use App\Models\City;
use App\Models\Service;
use App\Http\Controllers\Room;
use App\Http\Requests\Admins\HotelRequest;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    protected $hotel;
    protected $city;

    /**
     ** Create contructor.
     *
     * @param App\Models\Hotel $hotel        hotel
     * @param App\Models\City  $city         city
     * @param HotelService     $hotelService hotel service
     * @param Service          $service      service
     *
     * @return void
     */
    public function __construct(Hotel $hotel, City $city, HotelService $hotelService, Service $service)
    {
        $this->hotel = $hotel;
        $this->city = $city;
        $this->hotelService = $hotelService;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = $this->hotel->getHotelsPaginate();
        return view('admin.hotels.list_hotel', ['hotels' => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = $this->city->getCities();
        $service = $this->service->getServices();
        return view('admin.hotels.add_hotel', ['city' => $city, 'service' => $service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Admins\HotelRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
        // Get data from view
        $data = $request->only(['name','address','city_id','descript','number_star']);
        $services = $request['services'];
        if ($request->status == "on") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $image = str_random(4)."_".$name;
        while (file_exists(Hotel::FOLDER_UPLOAD_HOTEL.$image)) {
            $image = str_random(4)."_".$name;
        }
        $file->move(Hotel::FOLDER_UPLOAD_HOTEL, $image);
        $data['image'] = $image;
        // Create Hotel and show list hotels with meassage
        $check = $this->hotel->addHotel($data, $services);
        if (!empty($check)) {
            return $this->redirectSuccess("hotels.index", __('admin/hotel.hotel_add.hotel_add_success'));
        }
        return $this->redirectError("hotels.index", __('admin/hotel.hotel_add.hotel_add_error'));
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
        //
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
        $hotel = $this->hotel->findHotel($id);
        $city = $this->city->getCities();
        $service = $this->service->getServices();
        $servicesHotel = $this->hotelService->findServicesHotel($id)->toArray();
        $listServiceOld[] = "";
        foreach ($servicesHotel as $value) {
            $listServiceOld[] = $value['service_id'];
        }
        return view('admin.hotels.edit_hotel', ['hotel' => $hotel,'city' => $city, 'service' => $service, 'servicesHotel' => $listServiceOld]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Admins\HotelRequest $request request
     * @param int                                   $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, $id)
    {
        // Get request from view
        $data = $request->only(['name','address','city_id','descript','number_star']);
        $services = $request['services'];
        if ($request->status == "on") {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('image')) {
            $hotel = $this->hotel->findHotel($id);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists(Hotel::FOLDER_UPLOAD_HOTEL.$image)) {
                $image = str_random(4)."_".$name;
            }
            unlink(Hotel::FOLDER_UPLOAD_HOTEL.$hotel->image);
            $file->move(Hotel::FOLDER_UPLOAD_HOTEL, $image);
            $data['image'] = $image;
        }
        // Update hotel into database and show message
        $check = $this->hotel->editHotel($data, $id, $services);
        if (!empty($check)) {
            return $this->redirectSuccess("hotels.index", __('admin/hotel.hotel_edit.hotel_edit_success'));
        }
        return $this->redirectError("hotels.index", __('admin/hotel.hotel_edit.hotel_edit_error'));
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
        $check = $this->hotel->deleteHotel($id);
        if ($check) {
            return $this->redirectSuccess("hotels.index", __('admin/hotel.hotel_delete.hotel_delete_success'));
        }
        return $this->redirectError("hotels.index", __('admin/hotel.hotel_delete.hotel_delete_error'));
    }
}
