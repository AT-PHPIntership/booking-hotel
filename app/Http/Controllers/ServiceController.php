<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\Admins\ServiceRequest;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    protected $service;
    protected $serviceType;

    /**
     ** Create contructor.
     *
     * @param App\Models\Service     $service     service
     * @param App\Models\ServiceType $serviceType serviceType
     *
     * @return void
     */
    public function __construct(Service $service, ServiceType $serviceType)
    {
        $this->service = $service;
        $this->serviceType = $serviceType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->getServicesPagination();
        return view('admin.services.list_service', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceTypes = $this->serviceType->getListServiceType();
        return view('admin.services.add_service', ['serviceTypes' => $serviceTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Admins\ServiceRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        // Get data from view
        $data = $request->only(['name','service_type_id','status']);
        $data['user_id'] = Auth::user()->id;
        // Create User and show list users with meassage
        $check = $this->service->addService($data);
        if (!empty($check)) {
            return $this->redirectSuccess("services.index", __('admin/service.service_add.service_add_success'));
        }
        return $this->redirectError("services.index", __('admin/service.service_add.service_add_error'));
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
        $serviceTypes = $this->serviceType->getListServiceType();
        $service = $this->service->findService($id);
        return view('admin.services.edit_service', ['serviceTypes' => $serviceTypes, 'service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Admins\ServiceRequest $request request
     * @param int                                     $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        // Get data from view
        $data = $request->only(['name','service_type_id','status']);
        $data['user_id'] = Auth::user()->id;
        // Create User and show list users with meassage
        $check = $this->service->editService($data, $id);
        if (!empty($check)) {
            return $this->redirectSuccess("services.index", __('admin/service.service_edit.service_edit_success'));
        }
        return $this->redirectError("services.index", __('admin/service.service_edit.service_edit_error'));
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
        $check = $this->service->deleteService($id);
        if ($check) {
            return $this->redirectSuccess("services.index", __('admin/service.service_delete.service_delete_success'));
        }
        return $this->redirectError("services.index", __('admin/hotel.service_delete.service_delete_error'));
    }
}
