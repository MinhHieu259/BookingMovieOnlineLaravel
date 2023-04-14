<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMucPhim extends Model
{
    use HasFactory;

    protected $table = 'DanhMucPhim';
    protected $primaryKey = 'maDanhMuc';
    protected $casts = [
        'maDanhMuc' => 'string'
    ];
    public $timestamps = false;
    protected $fillable = [
        'maDanhMuc',
        'tenDanhMuc',
        'deleted'
    ];

    public static function InsertDanhMuc($request)
    {
        $data = [
            '',
            (string)$request->input('tenDanhMuc')
        ];
        $results = DB::select('EXEC SaveDanhMucPhim ?, ?', $data);
        return $results;
    }

    public static function getListDanhMuc()
    {
        $results = DB::select('EXEC getListDanhMucPhim');
        return $results;
    }

    public static function getDetailDanhMuc($maDanhMuc)
    {
        $results = DB::select('EXEC getDetailDanhMuc ?', [$maDanhMuc]);
        return $results[0] ?? [];
    }

    public static function UpdateDanhMuc($request, $maDanhMuc)
    {
        $data = [
            (string)$maDanhMuc,
            (string)$request->input('tenDanhMuc')
        ];
        $results = DB::select('EXEC UpdateDanhMucPhim ?, ?', $data);
        return $results;
    }

    public static function DeleteDanhMuc($maDanhMuc)
    {
        $results = DB::select('EXEC DeleteDanhMucPhim ?', [$maDanhMuc]);
        return $results;
    }
}
