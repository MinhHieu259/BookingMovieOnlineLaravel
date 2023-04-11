<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tinh extends Model
{
    use HasFactory;

    protected $table = 'Tinh';
    protected $fillable = [
        'maTinh',
        'tenTinh'
    ];

    public static function getAllTinh()
    {
        $results = DB::select('EXEC getAllProvinces');
        return $results;
    }
}
