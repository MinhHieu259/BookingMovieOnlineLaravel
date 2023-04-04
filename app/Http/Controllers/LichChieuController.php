<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function LichChieu()
    {
        return view('components.user.LichChieu.lich-chieu');
    }

    public function ChiTietLichChieu()
    {
        return view('components.user.LichChieu.chi-tiet-lich-chieu');
    }
}
