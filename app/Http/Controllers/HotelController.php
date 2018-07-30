<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
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
        $hotel = $this->hotel->getHotels();
        return view('admin.hotels.list_hotel', ['hotel' => $hotel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotel = $this->hotel->getHotels();
        $city = City::all();
        return view('admin.hotels.add_hotel', ['hotel' => $hotel, 'city' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form input
        $this->validate(
            $request,
            [
            'name' => 'required|min:5|max:100|unique:hotels,name',
            'address' => 'required|min:5|max:100',
            'descript' => 'required|max:1000',
            ],
            [
            'name.required' => 'Hotel name is empty',
            'name.min' => 'Hotel name from 5 to 100',
            'name.max' => 'Hotel name from 5 to 100',
            'name.unique' => 'name is duplication',
            'address.required' => 'address is empty',
            'address.min' => 'address from 5 to 100',
            'address.max' => 'address from 5 to 100',
            'descript.required' => 'description is empty',
            'descript.max' => 'description long',
            ]
        );
        // Create new hotel
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city_id = $request->city_id;
        if ($request->status == "on") {
            $hotel->status = true;
        } else {
            $hotel->status = false;
        }
        $hotel->descript = $request->descript;
        $hotel->user_id = Auth::user()->id;
        $hotel->number_star = $request->number_star;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                $request->session()->flash('message', 'Image\' format is wrong');
                return redirect("admin/hotels/create");
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/hotel/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/hotel/", $image);
            $hotel->image = $image;
        } else {
            $hotel->image = "";
        }
        $hotel->save();
        $request->session()->flash('message', 'Success');
        return redirect("admin/hotels/create");
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
        echo $id;
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
        $city = City::all();
        return view('admin.hotels.edit_hotel', ['hotel' => $hotel, 'city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate form input
        $this->validate(
            $request,
            [
            'name' => "required|min:5|max:100|unique:hotels,name,$id",
            'address' => 'required|min:5|max:100',
            'descript' => 'required|max:1000',
            ],
            [
            'name.required' => 'Hotel name is empty',
            'name.min' => 'Hotel name from 5 to 100',
            'name.max' => 'Hotel name from 5 to 100',
            'name.unique' => 'name is duplication',
            'address.required' => 'address is empty',
            'address.min' => 'address from 5 to 100',
            'address.max' => 'address from 5 to 100',
            'descript.required' => 'description is empty',
            'descript.max' => 'description long',
            ]
        );
        // Update hotel
        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city_id = $request->city_id;
        if ($request->status == "on") {
            $hotel->status = true;
        } else {
            $hotel->status = false;
        }
        $hotel->descript = $request->descript;
        $hotel->user_id = Auth::user()->id;
        $hotel->number_star = $request->number_star;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                $request->session()->flash('message', 'Image\' format is wrong');
                return redirect("admin/hotels/create");
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while (file_exists("upload/hotel/".$image)) {
                $image = str_random(4)."_".$name;
            }
            unlink('upload/hotel/'.$hotel->image);
            $file->move("upload/hotel/", $image);
            $hotel->image = $image;
        }
        $hotel->save();
        $request->session()->flash('message', 'Edit Success');
        return redirect("admin/hotels/$id/edit");
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
        //
        echo "delete" . $id;
    }
}
