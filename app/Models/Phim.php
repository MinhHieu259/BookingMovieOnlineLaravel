<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    protected $table = 'PHIM';
    protected $primaryKey = 'maPhim';
    public $timestamps = false;
    protected $casts = [
        'maPhim' => 'string'
    ];
    protected $fillable = [
        'maPhim',
        'tenPhim',
        'ngayKhoiChieu',
        'moTaPhim',
        'linkTrailer',
        'maDanhMuc',
        'giaVe',
        'deleted'
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
