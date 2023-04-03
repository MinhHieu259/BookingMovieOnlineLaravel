<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDayGhe extends Model
{
    use HasFactory;

    protected $table = 'ChiTietDayGhe';
    protected $fillable = [
        'maChiTietDayGhe',
        'maDayGhe',
        'tenGhe',
        'loaiGhe',
        'gia',
        'trangThai',
        'maSuatChieu'
    ];

    public function DayGhe(){
        return $this->belongsTo(DayGhe::class, 'maDayGhe');
    }

    public function SuatChieu(){
        return $this->belongsTo(SuatChieu::class, 'maSuatChieu');
    }
}
