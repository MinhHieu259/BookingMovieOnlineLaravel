<?php

namespace App\Http\Controllers;

use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\Phim;
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

    public function LichChieuView($slug)
    {
        $film = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->join('DanhMucPhim as DM', 'DM.maDanhMuc', '=', 'PHIM.maDanhMuc')
            ->where('slug', $slug)
            ->select('PHIM.*', 'HA.linkHinhAnh', 'DM.tenDanhMuc')
            ->first();
        $actors = DienVien::whereIn('maDienVien', json_decode($film->maDienVien))->get();
        $directors = DaoDien::whereIn('maDaoDien', json_decode($film->maDaoDien))->get();
        return view('components.user.LichChieu.chi-tiet-lich-chieu', compact('film', 'actors', 'directors'));
    }
}
