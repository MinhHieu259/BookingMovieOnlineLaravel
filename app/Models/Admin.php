<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'Admin';
    protected $primaryKey = 'maAdmin';
    protected $casts = [
        'maAdmin' => 'string'
    ];
    protected $fillable = [
        'maAdmin',
        'tenAdmin',
        'username',
        'password',
        'trangThai',
        'mapRap',
        'maQuyen'
    ];

    public function Rap(){
        return $this->belongsTo(RAP::class, 'mapRap');
    }
}
