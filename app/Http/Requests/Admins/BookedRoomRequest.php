<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class BookedRoomRequest extends FormRequest
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
                
                ];
                break;
            case 'PUT':
                return [
                    'status' => 'required|in:0,1',
                ];
                break;
        }
    }

    /**
     * Config form return validation.
     *
     * @return array
     */
    public function messages()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    
                ];
                break;
            case 'PUT':
                return [
                    'status.required' => __('admin/booked_room.booked_room_edit.booked_room_status_required'),
                    'status.in' => __('admin/booked_room.booked_room_edit.booked_room_status_in'),
                ];
                break;
        }
    }
}
