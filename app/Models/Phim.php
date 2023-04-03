<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    protected $table = 'PHIM';
    protected $fillable = [
        'maPhim',
        'tenPhim',
        'ngayKhoiChieu',
        'moTaPhim',
        'linkTrailer',
        'maChiTietRap',
        'maDanhMuc'
    ];

    public function ChiTietRap()
    {
        return $this->belongsTo(ChiTietRap::class, 'maChiTietRap');
    }

    public function DanhMucPhim()
    {
        return $this->belongsTo(DanhMucPhim::class, 'maDanhMuc');
    }
}
