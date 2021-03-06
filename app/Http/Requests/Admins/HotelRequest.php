<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|min:5|max:100|unique:hotels,name',
                    'address' => 'required|min:5|max:100',
                    'descript' => 'required|max:1000',
                    'image' => 'required|image',
                ];
                break;
            case 'PUT':
                return [
                    'name' => "required|min:5|max:100|unique:hotels,name,".$this->route()->parameter('hotel'),
                    'address' => 'required|min:5|max:100',
                    'descript' => 'required|max:1000',
                    'image' => 'image',
                ];
                break;
        }
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'name.required' => __('admin/hotel.hotel_add.hotel_name_required'),
                    'name.min' => __('admin/hotel.hotel_add.hotel_name_min'),
                    'name.max' => __('admin/hotel.hotel_add.hotel_name_max'),
                    'name.unique' => __('admin/hotel.hotel_add.hotel_name_unique'),
                    'address.required' => __('admin/hotel.hotel_add.hotel_address_required'),
                    'address.min' => __('admin/hotel.hotel_add.hotel_address_min'),
                    'address.max' => __('admin/hotel.hotel_add.hotel_address_max'),
                    'descript.required' => __('admin/hotel.hotel_add.hotel_descript_required'),
                    'descript.max' => __('admin/hotel.hotel_add.hotel_descript_max'),
                    'image.required' => __('admin/hotel.hotel_add.hotel_image_required'),
                    'image.image' => __('admin/hotel.hotel_add.hotel_image_format'),
                ];
                break;
            case 'PUT':
                return [
                    'name.required' => __('admin/hotel.hotel_edit.hotel_name_required'),
                    'name.min' => __('admin/hotel.hotel_edit.hotel_name_min'),
                    'name.max' => __('admin/hotel.hotel_edit.hotel_name_max'),
                    'name.unique' => __('admin/hotel.hotel_edit.hotel_name_unique'),
                    'address.required' => __('admin/hotel.hotel_edit.hotel_address_required'),
                    'address.min' => __('admin/hotel.hotel_edit.hotel_address_min'),
                    'address.max' => __('admin/hotel.hotel_edit.hotel_address_max'),
                    'descript.required' => __('admin/hotel.hotel_add.hotel_descript_required'),
                    'descript.max' => __('admin/hotel.hotel_edit.hotel_descript_max'),
                    'image.image' => __('admin/hotel.hotel_edit.hotel_image_format'),
                ];
                break;
        }
    }
}
