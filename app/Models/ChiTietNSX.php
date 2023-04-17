<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNSX extends Model
{
    use HasFactory;

    protected $table = 'ChiTietNhaSX';
    protected $primaryKey = 'maChiTiet';
    public $timestamps = false;
    protected $casts = [
        'maChiTiet' => 'string'
    ];
    protected $fillable = [
        'maChiTiet',
        'maPhim',
        'maNhaSanXuat',
        'deleted'
    ];
}
