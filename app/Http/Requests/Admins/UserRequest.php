<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    'username' => 'required|string|max:255|unique:users,username',
                    'email' => 'required|string|email|max:255|unique:users,email',
                    'phone' => 'required|regex:/^(0)[1-9][0-9]{8,9}$/',
                    'address' => 'required|max:255',
                    'password' => 'required|string|min:6|confirmed',
                    'role' => 'in:admin,user',
                ];
                break;
            case 'PUT':
                return [
                    
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
        return
        [
            'username.required' =>  __('admin/user.user_add.user_username_required'),
            'username.string' => __('admin/user.user_add.user_username_string'),
            'username.max' => __('admin/user.user_add.user_username_max'),
            'username.unique' => __('admin/user.user_add.user_username_unique'),
            'email.required' => __('admin/user.user_add.user_email_required'),
            'email.string' => __('admin/user.user_add.user_email_string'),
            'email.email' => __('admin/user.user_add.user_email_email'),
            'email.max' => __('admin/user.user_add.user_email_max'),
            'email.unique' => __('admin/user.user_add.user_email_unique'),
            'phone.required' => __('admin/user.user_add.user_phone_required'),
            'phone.regex' => __('admin/user.user_add.user_phone_regex'),
            'address.required' => __('admin/user.user_add.user_address_required'),
            'address.max' => __('admin/user.user_add.user_address_max'),
            'password.required' => __('admin/user.user_add.user_password_required'),
            'password.string' => __('admin/user.user_add.user_password_string'),
            'password.min' => __('admin/user.user_add.user_password_min'),
            'password.confirmed' => __('admin/user.user_add.user_password_confirmed'),
            'role.in' => __('admin/user.user_add.user_role_check'),
        ];
    }
}
