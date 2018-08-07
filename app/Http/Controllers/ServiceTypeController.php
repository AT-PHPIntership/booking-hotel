<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Auth;

class ServiceTypeController extends Controller
{
    protected $service_type;

    /**
     ** Create contructor.
     *
     * @param App\Models\ServiceType $service_type service_type
     *
     * @return void
     */
    public function __construct(ServiceType $service_type)
    {
        $this->service_type = $service_type;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_types = $this->service_type->getServiceTypes();
        return view('admin.service_types.list_service_type', ['service_types' => $service_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_types.add_service_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get data from view
        $data = $request->only(['name','service_id','hotel_id']);
        $data['user_id'] = Auth::user()->id;
        // Create User and show list users with meassage
        $check = $this->service_type->addServiceType($data);
        if (!empty($check)) {
            return $this->redirectSuccess("service_types.index", __('admin/service_type.service_type_add.service_type_add_success'));
        }
        return $this->redirectError("service_types.index", __('admin/service_type.service_type_add.service_type_add_error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "show".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "update".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "delete".$id;
    }
}
