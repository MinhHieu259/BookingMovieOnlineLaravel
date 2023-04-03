<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $table = 'PHONG';
    protected $fillable = [
        'maPhong',
        'tenPhong',
        'maChiTietRap'
    ];

    public function ChiTietRap()
    {
        return $this->belongsTo(ChiTietRap::class, 'maChiTietRap');
    }
}
