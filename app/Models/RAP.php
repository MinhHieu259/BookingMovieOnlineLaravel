<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

//    public function getAvatarUrlAttribute()
//    {
//        if ($this->anhDaiDien && Storage::disk('rap')->exists($this->anhDaiDien)) {
//            return asset('storage/rap/' . $this->anhDaiDien);
//        }
//        return asset('no_image.jpg');
//    }
}
