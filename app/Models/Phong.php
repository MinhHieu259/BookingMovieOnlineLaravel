<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Phong extends Model
{
    use HasFactory;

    protected $table = 'PHONG';
    protected $primaryKey = 'maPhong';
    protected $casts = [
        'maPhong' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maPhong',
        'tenPhong',
        'maChiTietRap'
    ];

    public function ChiTietRap()
    {
        return $this->belongsTo(ChiTietRap::class, 'maChiTietRap');
    }

    public static function getListPhongOfCum($maCum)
    {
        $results = DB::select('EXEC getListPhong ?', [$maCum]);
        return $results;
    }

    public static function InsertPhong($request, $maCum)
    {
        $data = [
            '',
            (string)$request->input('tenPhong'),
            (string)$maCum
        ];
        $results = DB::select('EXEC SavePhong ?, ?, ?', $data);
        return $results;
    }

    public static function EditPhong($maCum, $maPhong)
    {
        $results = DB::select('EXEC getDetailPhong ?, ?', [$maCum, $maPhong]);
        return $results[0];
    }

    public static function UpdatePhong($request, $maCum, $maPhong)
    {
        $data = [
            (string)$maCum,
            (string)$maPhong,
            (string)$request->input('tenPhong')
        ];
        $results = DB::select('EXEC UpdatePhong ?, ?, ?', $data);
        return $results;
    }

    public static function DeletePhong($maPhong)
    {
        $results = DB::select('EXEC DeletePhong ?', [$maPhong]);
        return $results;
    }
}
