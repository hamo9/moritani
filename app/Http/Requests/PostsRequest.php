<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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

            'title_ar'           => 'required|unique:posts,title,'.$this->id,
            'title_fr'           => 'required|unique:posts,title,'.$this->id,
            'body_ar'            => 'required',
            'body_fr'            => 'required',
            'category_id'        => 'required',
            'photo'            => 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg',

        ];
    }

    public function messages()
    {
        return
        [
            'title_ar.required'     => 'يجب ادخال عنوان المقال بالعربي',
            'title_ar.unique'       => 'هذا العنوان مستخدم من قبل',
            'title_fr.required'     => 'يجب ادخال عنوان المقال الفرنسي',
            'title_fr.unique'       => 'هذا العنوان مستخدم من قبل',

            'body_ar.required'      => 'يجب ادخال تفاصيل المقال بالعربي',
            'body_fr.required'      => 'يجب ادخال تفاصيل المقال الفرنسي',

            'category_id.required' => 'يجب اختيار اسم القسم الرئيسي',

            'photo.required'             => 'الصورة الخاصة بالمقال مطلوبة',
            'photo.mimes'                => 'الصورة يجب ان تكون من نوع jpeg png او jpg او gif  او svg',
        ];
    }
}
