<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class videosRequest extends FormRequest
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
            'title_ar'           => 'required|unique:videos,title,'.$this->id,
            'title_fr'           => 'required|unique:videos,title,'.$this->id,
            'body_ar'            => 'required',
            'body_fr'            => 'required',
            'video'             => 'required_without:id|mimes:mp3,mp4',

        ];
    }

    public function messages()
    {
        return
        [
            'title_ar.required'     => 'يجب ادخال عنوان الفيديو بالعربي',
            'title_ar.unique'       => 'هذا العنوان مستخدم من قبل',
            'title_fr.required'     => 'يجب ادخال عنوان الفيديو الفرنسي',
            'title_fr.unique'       => 'هذا العنوان مستخدم من قبل',

            'body_ar.required'      => 'يجب ادخال تفاصيل الفيديو بالعربي',
            'body_fr.required'      => 'يجب ادخال تفاصيل الفيديو الفرنسي',

            'video.required'        => '  الفيديو مطلوب',
            'video.mimes'           => 'الفيديو يجب ان تكون من نوع mp3 او mp4',
        ];
    }
}
