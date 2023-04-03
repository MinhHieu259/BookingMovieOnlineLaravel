<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $table = 'NguoiDung';
    protected $fillable = [
        'maNguoiDung',
        'hoVaTen',
        'gioiTinh',
        'ngaySinh',
        'diaChi',
        'soDienThoai',
        'anhDaiDien',
        'email',
        'tenTaiKhoan',
        'matKhau'
    ];
}
