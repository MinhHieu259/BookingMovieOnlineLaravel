<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRap extends Model
{
    use HasFactory;

    protected $table = 'AdminRap';
    protected $fillable = [
        'maAdmin',
        'tenAdmin',
        'tenTaiKhoan',
        'matKhau',
        'trangThai',
        'mapRap'
    ];

    public function Rap(){
        return $this->belongsTo(RAP::class, 'mapRap');
    }
}
