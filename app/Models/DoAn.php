<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoAn extends Model
{
    use HasFactory;

    protected $table = 'DoAn';
    protected $fillable = [
        'maDoAn',
        'tenDoAn',
        'gia',
        'maChiTietRap'
    ];

    public function ChiTietRap()
    {
        return $this->belongsTo(ChiTietRap::class, 'maChiTietRap');
    }
}
