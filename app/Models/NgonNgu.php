<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgonNgu extends Model
{
    use HasFactory;

    protected $table = 'NgonNgu';
    protected $primaryKey = 'maNgonNgu';
    public $timestamps = false;
    protected $fillable = [
        'maNgonNgu',
        'tenNgonNgu'
    ];
}
