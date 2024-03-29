<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $rules = [
            'username' => [
                'required'
            ],
            'password' => [
                'required'
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
          'username.required' => 'Tài khoản không được để trống',
          'password.required' => 'Mật khẩu không được để trống'
        ];
    }
}
