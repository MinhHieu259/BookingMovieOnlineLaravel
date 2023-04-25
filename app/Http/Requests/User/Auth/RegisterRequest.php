<?php

namespace App\Http\Requests\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'email'
            ],
            'username' => [
                'required'
            ],
            'password' => [
                'required',
                'min:8'
            ],
            'confirmPassword' => [
                'required',
                'same:password'
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không đueọc để trống',
            'username.required' => 'Tên đăng nhập không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Nhập tối thiểu 8 ksy tự',
            'confirmPassword.required' => 'Bạn chưa xác nhận mật khẩu',
            'confirmPassword.same' => 'Mật khẩu lại không chính xác'
        ];
    }
}
