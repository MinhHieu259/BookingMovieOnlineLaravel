<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    use HasFactory;

    protected $table = 'NhaSanXuat';
    protected $fillable = [
        'maNhaSanXuat',
        'tenNhaSanXuat',
        'maPhim'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
