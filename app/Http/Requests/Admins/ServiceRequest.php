<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                    'name' => 'required|min:3|max:50|unique:services,name',
                    'service_type_id' => 'numeric',
                    'status' => 'in:1,0',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'required|min:3|max:50|unique:services,name,'.$this->route()->parameter('service'),
                    'service_type_id' => 'numeric',
                    'status' => 'in:1,0',
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
                    'name.required' => __('admin/service.service_add.service_name_required'),
                    'name.min' => __('admin/service.service_add.service_name_min'),
                    'name.max' => __('admin/service.service_add.service_name_max'),
                    'name.unique' => __('admin/service.service_add.service_name_unique'),
                    'service_type_id' => __('admin/service.service_add.service_type_eixst'),
                    'status.in' => __('admin/service.service_add.service_status_in'),
                ];
                break;
            case 'PUT':
                return [
                    'name.required' => __('admin/service.service_add.service_name_required'),
                    'name.min' => __('admin/service.service_add.service_name_min'),
                    'name.max' => __('admin/service.service_add.service_name_max'),
                    'name.unique' => __('admin/service.service_add.service_name_unique'),
                    'service_type_id' => __('admin/service.service_add.service_type_eixst'),
                    'status.in' => __('admin/service.service_add.service_status_in'),
                ];
                break;
        }
    }
}
