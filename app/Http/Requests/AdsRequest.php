<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
        return
        [
            'url'               => 'required',
            'photo'             => 'required_without:id|image',
        ];
    }

    public function messages()
    {
        return
        [


            'url.required'                  => 'يجب اختيار عنوان الاعلان ',
            'photo.required'             => 'الصورة الخاصة بالمقال مطلوبة',
        ];
    }
}
