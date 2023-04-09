<?php

namespace App\Http\Requests\Admin\CumRap;

use Illuminate\Foundation\Http\FormRequest;

class SaveCumRap extends FormRequest
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
            'tenRap' => [
                'required'
            ],
            'diaChi' => [
                'required'
            ],
            'map' => [
                'required'
            ],
            'tinh' => [
                'required'
            ],
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'tenRap.required' => 'Tên rạp không được để trống',
            'diaChi.required' => 'Địa chỉ không được để trống',
            'map.required' => 'Địa chỉ bản đồ không được để trống',
            'tinh.required' => 'Tỉnh không được để trống',
        ];
    }
}
