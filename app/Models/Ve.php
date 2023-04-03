<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;

    protected $table = 'VE';
    protected $fillable = [
        'maVe',
        'giaVe',
        'maPhim',
        'maPhong'
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
