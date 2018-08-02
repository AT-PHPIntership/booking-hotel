<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admins\CityRequest;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    protected $city;

    /**
     ** Create contructor.
     *
     * @param App\Models\City $city city
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
        $cities = $this->city->getCities();
        return view('admin.cities.cities', ['cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.add_city');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\CityRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        // $data = $request->only('city', 'country');
        // dd($data)
        // dd($request->rules());

        $data = $request->only('city', 'country');
        $data['user_id'] = Auth::user()->id;
        $check = $this->city->addCity($data);
        if (!empty($check)) {
            return $this->redirectSuccess('cities.index', __('admin/layout.message.mes_add_success'));
        }
        return $this->redirectError('cities.index', __('admin/layout.message.mes_fail'));
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
        $check = $this->city->delCity($id);
        if ($check) {
            return $this->redirectSuccess('cities.index', __('admin/layout.message.mes_del_success'));
        }
        return $this->redirectError('cities.index', __('admin/layout.message.mes_fail'));
    }
}
