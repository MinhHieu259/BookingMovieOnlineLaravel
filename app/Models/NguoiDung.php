<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $table = 'NguoiDung';
    protected $primaryKey = 'maNguoiDung';
    protected $casts = ['maNguoiDung' => 'string'];
    public $timestamps = false;
    protected $fillable = [
        'maNguoiDung',
        'hoVaTen',
        'gioiTinh',
        'ngaySinh',
        'diaChi',
        'soDienThoai',
        'anhDaiDien',
        'email',
        'username',
        'password',
        'trangThai'
    ];
}
