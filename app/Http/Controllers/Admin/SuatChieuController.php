<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use Illuminate\Http\Request;

class SuatChieuController extends Controller
{
    public function index($maPhim)
    {
        $phim = Phim::where('maPhim', $maPhim)->first();
        return view('components.admin.suat-chieu.danh-sach-suat-chieu', compact('phim'));
    }

    public function add()
    {
        return view('components.admin.suat-chieu.them-moi-lich-chieu');
    }
}
