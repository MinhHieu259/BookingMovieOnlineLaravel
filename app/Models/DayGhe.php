<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayGhe extends Model
{
    use HasFactory;

    protected $table = 'DayGhe';
    protected $fillable = [
        'maDayGhe',
        'tenDayGhe'
    ];
}
