<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuatChieu extends Model
{
    use HasFactory;

    protected $table = 'SuatChieu';
    protected $fillable = [
        'maSuatChieu',
        'ngayChieu',
        'gioChieu',
        'maPhim',
        'maPhong',
        'giaVe'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }

    public function Phong()
    {
        return $this->belongsTo(Phong::class, 'maPhong');
    }
}
