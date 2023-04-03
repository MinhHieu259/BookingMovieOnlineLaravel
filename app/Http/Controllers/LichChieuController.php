<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function LichChieu()
    {
        return view('components.user.lich-chieu');
    }

}
