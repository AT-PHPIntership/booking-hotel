<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
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
        return view('admin.hotels.add_hotel', ['hotel' => $hotel]);
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
        $this->validate($request,[
        'name' => 'required|min:5|max:100',
        'address' => 'required|min:5|max:100',
        'descript' => 'required|max:1000',
        ],
        [
        'name.required' => 'Hotel name is empty',
        'name.min' => 'Hotel name from 5 to 100',
        'name.max' => 'Hotel name from 5 to 100',
        'address.required' => 'address is empty',
        'address.min' => 'address from 5 to 100',
        'address.max' => 'address from 5 to 100',
        'descript.required' => 'description is empty',
        'descript.max' => 'description long',
        ]);
        // Create new hotel
        $hotel = New Hotel;
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->city_id = $request->city_id;
        if ($request->status == "on") {
            $hotel->status = true;
        } else {
            $hotel->status = false;
        }
        $hotel->descript = $request->descript;
        $hotel->user_id = $user = Auth::user()->id;
        $hotel->number_star = $request->number_star;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png') {
                $request->session()->flash('message','Image\' format is wrong');
                return redirect("admin/hotels/create");
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
            while(file_exists("upload/hotel/".$image)) {
                $image = str_random(4)."_".$name;
            }
            $file->move("upload/hotel/",$image);
            $hotel->image = $image;
        } else {
            $hotel->image = "";
        }
        $hotel->save();
        $request->session()->flash('message','Success');
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
        //
        echo "edit" . $id;
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
        //
        echo $request . $id;
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
