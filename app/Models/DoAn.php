<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DoAn extends Model
{
    use HasFactory;

    protected $table = 'DoAn';
    protected $primaryKey = 'maDoAn';
    public $timestamps = false;
    protected $casts = [
        'maDoAn' => 'string'
    ];
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

    public static function SaveDoAn($request)
    {
        $data = [
            '',
            (string)$request->input('tenDoAn'),
            (string)$request->input('gia'),
            (string)$request->input('maChiTietRap')
        ];
        $results = DB::select('EXEC SaveDoAn ?, ?, ?, ?', $data);
        return $results;
    }
}
