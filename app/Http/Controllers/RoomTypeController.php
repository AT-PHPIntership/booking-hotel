<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admins\RoomTypeRequest;
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
     * @param App\Http\Requests\Admins\RoomTypeRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $data = $request->only('name');
        $data['user_id'] = Auth::user()->id;
        $check = $this->roomType->addRoomType($data);
        if (!empty($check)) {
            return $this->redirectSuccess('room-types.index', __('admin/room_type.room_type_add.mes_success'));
        }
        return $this->redirectError('room-types.index', __('admin/room_type.room_type_add.mes_fail'));
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
        $roomType = $this->roomType->getRoomType($id);
        return view('admin.room_types.edit_room_type', ['roomType'=>$roomType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, $id)
    {
        $data = $request->only('name');
        $check = $this->roomType->editRoomType(['id' => $id], $data);
        if ($check) {
            return $this->redirectSuccess('room-types.index', __('admin/room_type.room_type_edit.mes_success'));
        }
        return $this->redirectError('room-types.index', __('admin/room_type.room_type_edit.mes_fail'));
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
        $check = $this->roomType->delRoomType($id);
        if ($check) {
            return $this->redirectSuccess('room-types.index', __('admin/room_type.room_type_del.mes_success'));
        }
        return $this->redirectError('room-types.index', __('admin/room_type.room_type_del.mes_fail'));
    }
}
