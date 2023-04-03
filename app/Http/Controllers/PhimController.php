<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function DangChieu()
    {
        return view('components.user.dang-chieu');
    }

    public function SapChieu()
    {
        return view('components.user.sap-chieu');
    }

    public function MuaVe()
    {
        return view('components.user.mua-ve');
    }
}
