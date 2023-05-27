<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'BaiViet';
    protected $primaryKey = 'maBaiViet';
    protected $casts = [
        'maBaiViet' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maBaiViet',
        'tieuDe',
        'moTa',
        'noiDung',
        'maNguoiDang',
        'hinhAnh',
        'maPhim',
        'deleted',
        'thoiGianDang',
        'thoiGianCapNhat'
    ];
}
