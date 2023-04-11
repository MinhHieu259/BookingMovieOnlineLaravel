<?php

namespace App\Http\Requests\Admin\DoAn;

use Illuminate\Foundation\Http\FormRequest;

class AddDoAnRequest extends FormRequest
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
            'tenDoAn' => [
                'required'
            ],
            'gia' => [
                'required'
            ],
            'maChiTietRap' => [
                'required'
            ],
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'tenDoAn.required' => 'Tên đồ ăn không được để trống',
            'gia.required' => 'Giá không được để trống',
            'maChiTietRap.required' => 'Cụm rạp không được để trống',
        ];
    }
}
