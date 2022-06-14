<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class suCategoryRequest extends FormRequest
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
            'name_ar'           => 'required|unique:categories,name,'.$this->id,
            'name_fr'           => 'required|unique:categories,name,'.$this->id,
            'category_id'       => 'required',
        ];
    }

    public function messages()
    {
        return
        [
            'name_ar.required'     => 'يجب ادخال اسم القسم بالعربي',
            'name_ar.unique'       => 'هذا الاسم مستخدم من قبل',
            'name_fr.required'     => 'يجب ادخال اسم القسم الفرنسي',
            'name_fr.unique'       => 'هذا الاسم مستخدم من قبل',
            'category_id.required' => 'يجب اختيار اسم القسم الرئيسي',
        ];
    }
}
