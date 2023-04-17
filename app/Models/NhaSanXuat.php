<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    use HasFactory;

    protected $table = 'NhaSanXuat';
    protected $primaryKey = 'maNhaSanXuat';
    protected $casts = [
        'maNhaSanXuat' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maNhaSanXuat',
        'tenNhaSanXuat',
        'maPhim',
        'deleted'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
