<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class ServiceTypeRequest extends FormRequest
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
                    'name' => 'required|min:3|max:50|unique:service_types,name',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required|min:3|max:50|unique:service_types,name,'.$this->route()->parameter('service_type'),
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
                    'name.required' => __('admin/service_type.service_type_add.service_type_name_required'),
                    'name.min' => __('admin/service_type.service_type_add.service_type_name_min'),
                    'name.max' => __('admin/service_type.service_type_add.service_type_name_max'),
                    'name.unique' => __('admin/service_type.service_type_add.service_type_name_unique'),
                ];
                break;
            case 'PUT':
                return [
                    'name.required' => __('admin/service_type.service_type_add.service_type_name_required'),
                    'name.min' => __('admin/service_type.service_type_add.service_type_name_min'),
                    'name.max' => __('admin/service_type.service_type_add.service_type_name_max'),
                    'name.unique' => __('admin/service_type.service_type_add.service_type_name_unique'),
                ];
                break;
        }
    }
}
