<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Users\ApiFormRequest;

class SearchHotelsRequest extends ApiFormRequest
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
            'date_checkin' => 'required|date_format:Y-m-d|after:yesterday',
            'date_checkout' => 'required|date_format:Y-m-d|after:now',
            'city_id' => 'required|integer',
            'people' => "required|in:1,2,3,4,5",
        ];
    }
    /**
     * Config form return validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'date_checkin.required' => __('user/hotel.date_checkin_required'),
            'date_checkin.date_format' => __('user/hotel.date_checkin_date_format'),
            'date_checkin.after' => __('user/hotel.date_checkin_after'),
            'date_checkout.required' => __('user/hotel.date_checkout_required'),
            'date_checkout.date_format' => __('user/hotel.date_checkout_date_format'),
            'date_checkout.after' => __('user/hotel.date_checkout_after'),
            'city_id.required' => __('user/hotel.city_id_required'),
            'city_id.integer' => __('user/hotel.city_id_integer'),
            'people.required' => __('user/hotel.people_required'),
            'people.in' => __('user/hotel.people_in'),
        ];
    }
}
