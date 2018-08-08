<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admins\ServiceTypeRequest;

class ServiceTypeController extends Controller
{

    protected $serviceType;

    /**
     ** Create contructor.
     *
     * @param App\Models\ServiceType $serviceType serviceType
     *
     * @return void
     */
    public function __construct(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceType = $this->serviceType->getServiceTypes();
        return view('admin.service_types.list_service_type', ['serviceType' => $serviceType]);
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
     * @param App\Http\Requests\Admins\ServiceTypeRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceTypeRequest $request)
    {
        // Get data from view
        $data = $request->only(['name']);
        $data['user_id'] = Auth::user()->id;
        // Create User and show list users with meassage
        $check = $this->serviceType->addServiceType($data);
        if (!empty($check)) {
            return $this->redirectSuccess("service-types.index", __('admin/service_type.service_type_add.service_type_add_success'));
        }
        return $this->redirectError("service-types.index", __('admin/service_type.service_type_add.service_type_add_error'));
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
        echo "show".$id;
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
        $serviceType = $this->serviceType->findServiceType($id);
        return view('admin.service_types.edit_service_type', ['serviceType' => $serviceType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Admins\ServiceTypeRequest $request request
     * @param int                                         $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceTypeRequest $request, $id)
    {
        // Get data from view
        $data = $request->only(['name']);
        $data['user_id'] = Auth::user()->id;
        // Create User and show list users with meassage
        $check = $this->serviceType->editServiceType($data, $id);
        if (!empty($check)) {
            return $this->redirectSuccess("service-types.index", __('admin/service_type.service_type_edit.service_type_edit_success'));
        }
        return $this->redirectError("service-types.index", __('admin/service_type.service_type_edit.service_type_edit_error'));
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
        $check = $this->serviceType->deleteServiceType($id);
        if ($check) {
            return $this->redirectSuccess("service-types.index", __('admin/service_type.service_type_delete.service_type_delete_success'));
        }
        return $this->redirectError("service-types.index", __('admin/service_type.service_type_delete.service_type_delete_error'));
    }
}
