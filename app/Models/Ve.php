<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;

    protected $table = 'VE';
    protected $primaryKey = 'maVe';
    protected $casts = [
        'maVe' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maVe',
        'giaVe',
        'loaiVe',
        'maPhim',
        'maPhong',
        'maLichSu'
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
