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
        switch ($this->method()) {
            case 'POST':
                return [
                    'city' => 'required|unique:cities,city',
                    'country' => 'required',
                ];
                break;
            default:
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
        return
        [
            'city.required' =>  __('admin/city.city_add.rule_require'),
            'city.unique' => __('admin/city.city_add.rule_unique'),
            'country.required' => __('admin/city.city_add.rule_require'),
        ];
    }
}
