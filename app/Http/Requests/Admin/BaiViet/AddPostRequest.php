<?php

namespace App\Http\Requests\Admin\BaiViet;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'tieuDe' => [
                'required'
            ],
            'moTa' => [
                'required'
            ],
            'noiDungBaiViet' => [
                'required'
            ],
            'maPhim' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'tieuDe.required' => 'Tiêu đề bài viết không được để trống',
            'moTa.required' => 'Mô tả bài viết không được để trống',
            'noiDungBaiViet.required' => 'Nội dung bài viết không được để trống',
            'maPhim.required' => 'Phim không được để trống',
        ];
    }
}
