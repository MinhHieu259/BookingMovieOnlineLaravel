<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaoDien extends Model
{
    use HasFactory;

    protected $table = 'DaoDien';
    protected $fillable = [
        'maDaoDien',
        'tenDaoDien',
        'maPhim'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
