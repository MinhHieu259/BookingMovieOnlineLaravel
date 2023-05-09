<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuDat extends Model
{
    use HasFactory;

    protected $table = 'LichSuDat';
    protected $primaryKey = 'maLichSu';
    protected $casts = [
        'maLichSu' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maLichSu',
        'thoiGianDat',
        'tienDat',
        'maNguoiDung',
        'trangThai',
        'loaiThanhToan'
    ];

    public function NguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'maNguoiDung');
    }
}
