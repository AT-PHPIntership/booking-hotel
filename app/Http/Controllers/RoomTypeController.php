<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\admin\RoomTypeRequest;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RoomTypeController extends Controller
{

    protected $roomType;

    /**
     ** Create contructor.
     *
     * @param App\Models\RoomType $roomType roomType
     *
     * @return void
     */
    public function __construct(RoomType $roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = $this->roomType->getRoomTypes();
        return view('admin.room_types.list_room_type', ['roomTypes'=>$roomTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room_types.add_room_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {

        $check = $this->roomType->addRoomType($request);
        if ($check === true) {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Fail');
        }
        return redirect()->route('room-types.index');
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
        echo $id;
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
        echo $request + $id;
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
        echo $id;
    }
}
