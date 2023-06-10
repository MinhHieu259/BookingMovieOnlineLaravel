<?php

namespace App\Http\Requests\Admin\Phim;

use Illuminate\Foundation\Http\FormRequest;

class AddFilmRequest extends FormRequest
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
            'tenPhim' => [
                'required'
            ],
            'Trailer' => [
                'required'
            ],
            'moTa' => [
                'required'
            ],
            'ngayKhoiChieu' => [
                'required'
            ],
            'danhMuc' => [
                'required'
            ],
            'giaVe' => [
                'required',
                'numeric'
            ],
            'dienVien' => [
                'required'
            ],
            'nhaSanXuat' => [
                'required'
            ],
            'daoDien' => [
                'required'
            ],
            'thoiLuong' => [
                'required'
            ],
            'gioiHanTuoi' => [
                'required'
            ],
            'maNgonNgu' => [
                'required'
            ],
            'slider' => [
                'nullable'
            ]
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'tenPhim.required' => 'Tên phim không được để trống',
            'Trailer.required' => 'Trailer phim không được để trống',
            'moTa.required' => 'Mô tả phim không được để trống',
            'ngayKhoiChieu.required' => 'Ngày khởi chiếu không được để trống',
            'danhMuc.required' => 'Danh mục phim không được để trống',
            'giaVe.required' => 'Giá vé không được để trống',
            'giaVe.numeric' => 'Giá vé nhập không đúng định dạng',
            'dienVien.required' => 'Thông tin diễn viên không được để trống',
            'nhaSanXuat.required' => 'Thông tin nhà sản xuất không được để trống',
            'daoDien.required' => 'Thông tin đạo diễn không được để trống',
            'thoiLuong.required' => 'Thời lượng phim không được để trống',
            'gioiHanTuoi.required' => 'Giới hạn tuổi không được để trống',
            'maNgonNgu.required' => 'Ngôn ngữ không được để trống',
        ];
    }
}
