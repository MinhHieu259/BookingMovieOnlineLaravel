<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietLichSu extends Model
{
    use HasFactory;

    protected $table = 'ChiTietLichSu';
    protected $fillable = [
        'maChiTietLichSu',
        'maLichSu',
        'meVe',
        'trangThai'
    ];

    public function LichSuDat(){
        return $this->belongsTo(LichSuDat::class, 'maChiTietLichSu');
    }

    public function Ve(){
        return $this->belongsTo(SuatChieu::class, 'meVe');
    }
}
