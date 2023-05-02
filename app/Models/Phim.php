<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phim extends Model
{
    use HasFactory;

    protected $table = 'PHIM';
    protected $primaryKey = 'maPhim';
    public $timestamps = false;
    protected $casts = [
        'maPhim' => 'string',
//        'maDienVien' => 'array',
//        'maDaoDien' => 'array',
//        'maNhaSanXuat' => 'array'
    ];
    protected $fillable = [
        'maPhim',
        'tenPhim',
        'ngayKhoiChieu',
        'moTaPhim',
        'linkTrailer',
        'maDanhMuc',
        'giaVe',
        'deleted',
        'maDienVien',
        'maDaoDien',
        'maNhaSanXuat'
    ];

    public function ChiTietRap()
    {
        return $this->belongsTo(ChiTietRap::class, 'maChiTietRap');
    }

    public function DanhMucPhim()
    {
        return $this->belongsTo(DanhMucPhim::class, 'maDanhMuc');
    }

    public function DienVien()
    {
        return $this->hasMany(ChiTietDienVien::class, 'maPhim');
    }

    public static function DeletePhim($maPhim)
    {
        $results = DB::select('EXEC DeletePhim ?', [$maPhim]);
        return $results;
    }

}
