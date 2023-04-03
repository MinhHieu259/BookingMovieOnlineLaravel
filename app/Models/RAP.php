<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAP extends Model
{
    use HasFactory;

    protected $table = 'RAP';
    protected $fillable = [
        'maRap',
        'tenRap',
        'anhDaiDien'
    ];
}
