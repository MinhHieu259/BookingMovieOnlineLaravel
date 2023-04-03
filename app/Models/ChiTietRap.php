<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietRap extends Model
{
    use HasFactory;

    protected $table = 'ChiTietRap';
    protected $fillable = [
        'maChiTietRap',
        'tenRap',
        'diaChi',
        'map',
        'moTa',
        'maTinh',
        'maRap'
    ];

    public function Tinh(){
        return $this->belongsTo(Tinh::class, 'maTinh');
    }

    public function Rap(){
        return $this->belongsTo(RAP::class, 'maRap');
    }
}
