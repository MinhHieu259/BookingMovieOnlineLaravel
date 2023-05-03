<?php

namespace App\Http\Controllers;

use App\Models\ChiTietRap;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\Phim;
use App\Models\RAP;
use App\Models\Tinh;
use Illuminate\Http\Request;
use App\Helpers\date;

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
        $provinces = Tinh::all();
        $dates = date::getSixDayFromToday();
        $theater = RAP::get()[0];

        return view('components.user.LichChieu.chi-tiet-lich-chieu',
            compact('film', 'actors', 'directors', 'provinces', 'dates', 'theater'));
    }

    public function GetShowTime($province_id, $date_show, $slug)
    {
        $rap = RAP::all()[0];
        $results = ChiTietRap::join('Tinh', 'Tinh.maTinh', '=', 'ChiTietRap.maTinh')
            ->join('PHONG', 'PHONG.maChiTietRap', '=', 'ChiTietRap.maChiTietRap')
            ->join('SuatChieu as SC', 'SC.maPhong', '=', 'PHONG.maPhong')
            ->join('PHIM', 'SC.maPhim', '=', 'PHIM.maPhim')
            ->select('ChiTietRap.*', 'Tinh.tenTinh', 'SC.gioChieu', 'PHONG.tenPhong')
            ->where('ChiTietRap.maTinh', $province_id)
            ->where('PHIM.slug', $slug)
            ->where('SC.ngayChieu', date("d/m/Y", strtotime($date_show)))
            ->get();
        $result2 = [];
        foreach ($results as $result) {
            $maCTRap = $result->maChiTietRap;
            $suatChieu = [
                'gioChieu' => $result->gioChieu,
                'tenPhong' => $result->tenPhong
            ];

            if (!isset($result2[$maCTRap])) {
                $result2[$maCTRap] = [
                    'maCTRap' => $maCTRap,
                    'tenRap' => $result->tenRap,
                    'diaChi' => $result->diaChi,
                    'suatChieu' => [$suatChieu]
                ];
            } else {
                $result2[$maCTRap]['suatChieu'][] = $suatChieu;
            }
        }
        return response()->json([
            'rap' => $rap,
            'results' => array_values($result2)
        ]);
    }
}
