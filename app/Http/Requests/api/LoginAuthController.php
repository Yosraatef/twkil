<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;

class LoginAuthController extends FormRequest
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
          'codeJob'     => 'required|exists:users,codeJob',
          'password'     => 'required',
        ];
    }

    public function messages()
      {
          return [
              'codeJob.required' => 'يجب عليك ادخال الكود الوظيفي',
              'parent_id.exists:users,codeJob'  => 'هذا المستخدم غير موجود في قاعده البيانات',
              'password.required' => 'يرجى ادخال الرقم السري ',
          ];
      }
}
