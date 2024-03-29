<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'hoVaTen' => [
                'required'
            ],
            'soDienThoai' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'hoVaTen.required' => 'Họ và tên không được để trống',
            'soDienThoai.required' => 'Số điện thoại không được để trống'
        ];
    }
}
