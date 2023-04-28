<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'NguoiDung';
    protected $primaryKey = 'maNguoiDung';
    protected $casts = ['maNguoiDung' => 'string'];
    public $timestamps = false;
    protected $fillable = [
        'maNguoiDung',
        'hoVaTen',
        'gioiTinh',
        'ngaySinh',
        'diaChi',
        'soDienThoai',
        'anhDaiDien',
        'email',
        'username',
        'password',
        'trangThai'
    ];

    public function getAvatar()
    {
        if ($this->anhDaiDien){
            return asset('uploads/user/'.$this->anhDaiDien);
        }
        return asset('assets/images/user/no-avatar.png');
    }
}
