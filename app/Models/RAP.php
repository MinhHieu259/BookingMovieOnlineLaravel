<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RAP extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'RAP';
    protected $primaryKey = 'maRap';
    protected $casts = [
        'maRap' => 'string'
    ];
    protected $fillable = [
        'maRap',
        'tenRap',
        'anhDaiDien'
    ];

    public static function getInforRap()
    {
        $result = DB::select('EXEC getRapInformation');
        return $result[0] ?? [];
    }

//    public function getAvatarUrlAttribute()
//    {
//        if ($this->anhDaiDien && Storage::disk('rap')->exists($this->anhDaiDien)) {
//            return asset('storage/rap/' . $this->anhDaiDien);
//        }
//        return asset('no_image.jpg');
//    }
}
