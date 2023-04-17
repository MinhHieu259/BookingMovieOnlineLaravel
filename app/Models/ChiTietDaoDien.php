<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDaoDien extends Model
{
    use HasFactory;

    protected $table = 'ChiTietDaoDien';
    protected $primaryKey = 'maChiTiet';
    public $timestamps = false;
    protected $casts = [
        'maChiTiet' => 'string'
    ];
    protected $fillable = [
        'maChiTiet',
        'maPhim',
        'maDaoDien',
        'deleted'
    ];
}
