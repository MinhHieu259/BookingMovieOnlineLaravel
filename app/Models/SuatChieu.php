<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuatChieu extends Model
{
    use HasFactory;

    protected $table = 'SuatChieu';
    protected $primaryKey = 'maSuatChieu';
    protected $casts = [
        'maSuatChieu' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maSuatChieu',
        'ngayChieu',
        'gioChieu',
        'maPhim',
        'maPhong',
        'deleted'
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
