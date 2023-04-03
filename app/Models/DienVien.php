<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DienVien extends Model
{
    use HasFactory;

    protected $table = 'DienVien';
    protected $fillable = [
        'maDienVien',
        'tenDienVien',
        'maPhim'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
