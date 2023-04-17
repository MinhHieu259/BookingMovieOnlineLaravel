<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaoDien extends Model
{
    use HasFactory;

    protected $table = 'DaoDien';
    protected $primaryKey = 'maDaoDien';
    protected $casts = [
        'maDaoDien' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maDaoDien',
        'tenDaoDien',
        'maPhim',
        'deleted'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
