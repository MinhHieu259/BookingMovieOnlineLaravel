<?php

namespace App\Http\Requests\Admin\SuatChieu;

use Illuminate\Foundation\Http\FormRequest;

class AddSuatChieu extends FormRequest
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
            'ngayChieu' => [
                'required'
            ],
            'gioChieu' => [
                'required'
            ],
            'phongChieu' => [
                'required'
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'ngayChieu.required' => 'Ngày chiếu không được để trống',
            'gioChieu.required' => 'Giờ chiếu không được để trống',
            'phongChieu.required' => 'Phòng chiếu không được để trống'
        ];
    }
}
