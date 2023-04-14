<?php

namespace App\Http\Requests\Admin\DanhMuc;

use Illuminate\Foundation\Http\FormRequest;

class AddDanhMucRequest extends FormRequest
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
            'tenDanhMuc' => [
                'required'
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'tenDanhMuc.required' => 'Tên danh mục không được để trống'
        ];
    }
}
