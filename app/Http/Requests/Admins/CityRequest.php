<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        // $city = $this->route()->parameter('room_type');
        switch ($this->method()) {
            case 'POST':
                return [
                    'city' => 'required',
                    'country' => 'required|unique:cities,country',
                ];
                break;
            // case 'PUT':
            //     return ['name' => "required|min:1|max:50|unique:room_types,name,".$roomType];
            //     break;
        }
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
            'city.required' =>  __('admin/city.city_add.rule_require'),
            'country.required' => __('admin/city.city_add.rule_require'),
            'country.unique' => __('admin/city.city_add.rule_unique'),
        ];
    }
}
