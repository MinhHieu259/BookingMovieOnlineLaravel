<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuDat extends Model
{
    use HasFactory;

    protected $table = 'LichSuDat';
    protected $fillable = [
        'maLichSu',
        'thoiGianDat',
        'tienDat',
        'maNguoiDung'
    ];

    public function NguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'maNguoiDung');
    }
}
