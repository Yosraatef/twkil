<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
          'category_name'     => 'required|string',
          'parent_id'     => 'required',
          'description'     => 'required',
          'section_id'     => 'required',
          'category_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
    public function messages()
{
    return [
        'category_name.required' => ' التصنيف  من الضروري ادخالها ',
        'parent_id.required'  => 'A Parent Category  is required',
        'category_image.image' => 'The Category Image must be image',
        'category_image.mimes' => 'The Category Image extention must be jpeg,png,jpg,gif,svg',
    ];
}
}
