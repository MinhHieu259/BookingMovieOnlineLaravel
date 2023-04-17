<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhPhim extends Model
{
    use HasFactory;

    protected $table = 'HinhAnhPhim';
    protected $primaryKey ='maHinhAnh';
    protected $casts =[
        'maHinhAnh' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maHinhAnh',
        'linkHinhAnh',
        'maPhim',
        'deleted'
    ];

    public function Phim()
    {
        return $this->belongsTo(Phim::class, 'maPhim');
    }
}
