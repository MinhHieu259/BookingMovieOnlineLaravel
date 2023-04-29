<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function DangChieu()
    {
        return view('components.user.Phim.dang-chieu');
    }

    public function SapChieu()
    {
        return view('components.user.Phim.sap-chieu');
    }

    public function MuaVe()
    {
        return view('components.user.Phim.mua-ve');
    }

    public function ThongTinPhim()
    {
        return view('components.user.Phim.thong-tin-phim');
    }

    public function LichChieuView()
    {
        return view('components.user.Phim.lich-chieu');
    }
}
