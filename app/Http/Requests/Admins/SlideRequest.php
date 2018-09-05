<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'image.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'image' => 'required',
        ];
    }
    
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => __('admin/slide.slide_add.slide_image_required'),
            'image.image' => __('admin/slide.slide_add.slide_image_image'),
            'image.mimes' => __('admin/slide.slide_add.slide_image_mimes'),
        ];
    }
}
