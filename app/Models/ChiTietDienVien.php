<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDienVien extends Model
{
    use HasFactory;

    protected $table = 'ChiTietDienVien';
    protected $primaryKey = 'maChiTiet';
    public $timestamps = false;
    protected $casts = [
        'maChiTiet' => 'string'
    ];
    protected $fillable = [
        'maChiTiet',
        'maPhim',
        'maDienVien',
        'deleted'
    ];
}
