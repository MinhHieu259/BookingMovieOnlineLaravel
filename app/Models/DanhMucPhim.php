<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucPhim extends Model
{
    use HasFactory;

    protected $table = 'DanhMucPhim';
    protected $fillable = [
        'maDanhMuc',
        'tenDanhMuc'
    ];
}
