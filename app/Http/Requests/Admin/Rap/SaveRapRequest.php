<?php

namespace App\Http\Requests\Admin\Rap;

use Illuminate\Foundation\Http\FormRequest;

class SaveRapRequest extends FormRequest
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
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'tenRap.required' => 'Tên rạp không được để trống'
        ];
    }
}
