<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChiTietRap extends Model
{
    use HasFactory;

    protected $table = 'ChiTietRap';
    protected $primaryKey = 'maChiTietRap';
    public $timestamps = false;
    protected $casts = [
        'maChiTietRap' => 'string'
    ];
    protected $fillable = [
        'maChiTietRap',
        'tenRap',
        'diaChi',
        'map',
        'moTa',
        'maTinh',
        'maRap',
        'deleted'
    ];

    public function Tinh()
    {
        return $this->belongsTo(Tinh::class, 'maTinh');
    }

    public function Rap()
    {
        return $this->belongsTo(RAP::class, 'maRap');
    }

    public static function getDetailChiTietRap($maChiTietRap)
    {
        $result = DB::select('EXEC getDetailChiTietRap ?', [$maChiTietRap]);
        return $result[0];
    }

    public static function getListCumRap()
    {
        $results = DB::select('EXEC getListCumRap');
        return $results;
    }

    public static function InsertCumRap($request)
    {
        $rap = RAP::getInforRap();
        $data = [
            '',
            (string)$request->input('tenRap'),
            (string)$request->input('diaChi'),
            (string)$request->input('map'),
            (string)$request->input('motaRap'),
            (string)$request->input('tinh'),
            (string)$rap->maRap,
        ];
        $results = DB::select('EXEC SaveCumRap ?, ?, ?, ?, ?, ?, ? ', $data);
        return $results;
    }

    public static function UpdateCumRap($request, $maCum)
    {
        $data = [
            (string)$maCum,
            (string)$request->input('tenRap'),
            (string)$request->input('diaChi'),
            (string)$request->input('map'),
            (string)$request->input('motaRap'),
            (string)$request->input('tinh')
        ];
        $results = DB::select('EXEC UpdateCumRap ?, ?, ?, ?, ?, ? ', $data);
        return $results;
    }

    public static function DeleteCumRap($maCum)
    {
        $results = DB::select('EXEC DeleteCumRap ?', [$maCum]);
        return $results;
    }
}
