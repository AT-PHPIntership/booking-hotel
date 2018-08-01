<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
        return [
            'name' => 'required|min:1|max:50'
        ];
    }

    /**
     * Config form return validation.
     *
     * @return array
     */
    public function messages()
    {
        return
        [
            'name.required' =>  __('admin/room_type.room_type_add.rule_require'),
            'name.max' => __('admin/room_type.room_type_add.rule_length'),
            'name.min' => __('admin/room_type.room_type_add.rule_length'),
        ];
    }
}
