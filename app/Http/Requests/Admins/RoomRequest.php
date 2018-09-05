<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
                    'name' => 'required|max:50',
                    'hotel_id' => 'required|numeric',
                    'status' => 'in:1,0',
                    'descript' => 'required|max:1000',
                    'price' => 'required|numeric|min:5|max:99999999',
                    'discount' => 'numeric|max:100',
                    'image.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
                    'image' => 'required',
                ];
            break;
            case 'PUT':
                return [
                    'name' => 'required|max:50',
                    'hotel_id' => 'required|numeric',
                    'status' => 'in:1,0',
                    'descript' => 'required|max:1000',
                    'price' => 'required|numeric|min:5|max:99999999',
                    'discount' => 'numeric|max:100',
                    'image.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
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
                    'name.required' =>  __('admin/room.room_add.room_name_require'),
                    'name.max' => __('admin/room.room_add.room_name_max'),
                    'hotel_id.required' => __('admin/room.room_add.room_hotel_id_required'),
                    'hotel_id.numeric' => __('admin/room.room_add.room_hotel_id_numeric'),
                    'status.in' => __('admin/room.room_add.room_status'),
                    'descript.required' => __('admin/room.room_add.room_descript_required'),
                    'descript.max' => __('admin/room.room_add.room_descript_max'),
                    'price.required' => __('admin/room.room_add.room_price_required'),
                    'price.numeric' => __('admin/room.room_add.room_price_numeric'),
                    'price.min' => __('admin/room.room_add.room_price_min'),
                    'price.max' => __('admin/room.room_add.room_price_max'),
                    'discount.numeric' => __('admin/room.room_add.room_discount_numeric'),
                    'discount.max' => __('admin/room.room_add.room_discount_max'),
                    'image.required' => __('admin/room.room_add.room_image_required'),
                    'image.image' => __('admin/room.room_add.room_image_image'),
                    'image.mimes' => __('admin/room.room_add.room_image_mimes'),
                ];
                break;
            case 'PUT':
                return [
                    'name.required' =>  __('admin/room.room_edit.room_name_require'),
                    'name.max' => __('admin/room.room_edit.room_name_max'),
                    'hotel_id.required' => __('admin/room.room_edit.room_hotel_id_required'),
                    'hotel_id.numeric' => __('admin/room.room_edit.room_hotel_id_numeric'),
                    'status.in' => __('admin/room.room_edit.room_status'),
                    'descript.required' => __('admin/room.room_edit.room_descript_required'),
                    'descript.max' => __('admin/room.room_edit.room_descript_max'),
                    'price.required' => __('admin/room.room_edit.room_price_required'),
                    'price.numeric' => __('admin/room.room_edit.room_price_numeric'),
                    'price.min' => __('admin/room.room_edit.room_price_min'),
                    'price.max' => __('admin/room.room_edit.room_price_max'),
                    'discount.numeric' => __('admin/room.room_edit.room_discount_numeric'),
                    'discount.max' => __('admin/room.room_edit.room_discount_max'),
                    'image.image' => __('admin/room.room_edit.room_image_image'),
                    'image.mimes' => __('admin/room.room_edit.room_image_mimes'),
                ];
                break;
        }
    }
}
