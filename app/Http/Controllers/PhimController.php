<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDayGhe;
use App\Models\ChiTietRap;
use App\Models\DanhMucPhim;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\DoAn;
use App\Models\Phim;
use App\Models\RAP;
use App\Models\SuatChieu;
use App\Models\Tinh;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhimController extends Controller
{
    public function DangChieu()
    {
        $films = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('PHIM.deleted', '1')
            ->where('ngayKhoiChieu', '<', Carbon::now()->isoFormat('DD/MM/YYYY'))
            ->get();
        $categorys = DanhMucPhim::all();
        return view('components.user.Phim.dang-chieu', compact('films', 'categorys'));
    }

    public function GetListDangChieu(Request $request)
    {
        return response()->json([
            'data' => $request->all()
        ]);
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
            ->select('ChiTietRap.*', 'Tinh.tenTinh', 'SC.*', 'PHONG.tenPhong')
            ->where('ChiTietRap.maTinh', $province_id)
            ->where('PHIM.slug', $slug)
            ->where('SC.ngayChieu', date("d/m/Y", strtotime($date_show)))
            ->get();
        $result2 = [];
        foreach ($results as $result) {
            $maCTRap = $result->maChiTietRap;
            $suatChieu = [
                'gioChieu' => $result->gioChieu,
                'ngayChieu' => $result->ngayChieu,
                'tenPhong' => $result->tenPhong,
                'maSuatChieu' => $result->maSuatChieu
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

    public function ChooseSeatView($maSuatChieu)
    {
        //dd(base64_decode($maSuatChieu));
        $suatChieuInfor = SuatChieu::join('PHIM', 'PHIM.maPhim', '=', 'SuatChieu.maPhim')
            ->join('PHONG', 'PHONG.maPhong', '=', 'SuatChieu.maPhong')
            ->join('ChiTietRap as CTR', 'CTR.maChiTietRap', '=', 'PHONG.maChiTietRap')
            ->select('SuatChieu.*', 'PHONG.tenPhong', 'CTR.tenRap', 'PHIM.tenPhim', 'PHIM.giaVe', 'PHIM.maPhim')
            ->where('SuatChieu.maSuatChieu', base64_decode($maSuatChieu))
            ->first();

        $countSeat = count(ChiTietDayGhe::where('maSuatChieu', base64_decode($maSuatChieu))
            ->get());
        $countSeatFree = count(ChiTietDayGhe::where('maSuatChieu', base64_decode($maSuatChieu))
            ->where('trangThai', '1')
            ->get());

        $foods = DoAn::join('ChiTietRap as CTR', 'DoAn.maChiTietRap', '=', 'CTR.maChiTietRap')
            ->join('PHONG', 'PHONG.maChiTietRap', '=', 'CTR.maChiTietRap')
            ->join('SuatChieu as SC', 'SC.maPhong', '=', 'PHONG.maPhong')
            ->select('DoAn.*')
            ->where('SC.maSuatChieu', base64_decode($maSuatChieu))
            ->get();

        $user = Auth::guard('nguoidung')->user();
        //return $chiTietDayGhe;
        return view('components.user.LichChieu.chon-ghe', compact('suatChieuInfor', 'foods', 'user', 'countSeat', 'countSeatFree'));
    }

    public function GetListSeat($maSuatChieu)
    {
        $chairs = DB::table('ChiTietDayGhe')
            ->leftJoin('SuatChieu', 'ChiTietDayGhe.maSuatChieu', '=', 'SuatChieu.maSuatChieu')
            ->leftJoin('DayGhe', 'ChiTietDayGhe.maDayGhe', '=', 'DayGhe.maDayGhe')
            ->select('ChiTietDayGhe.*', 'DayGhe.tenDayGhe')
            ->where('ChiTietDayGhe.maSuatChieu', base64_decode($maSuatChieu))
            ->get();
        // Nhóm các hàng theo tên của dãy ghế
        $groups = $chairs->groupBy('tenDayGhe');
        // Xây dựng lại mảng
        $result = [];
        foreach ($groups as $tenDayGhe => $chairs) {
            $seats = [];
            foreach ($chairs as $chair) {
                $seats[] = [
                    'name' => $chair->tenGhe,
                    'type' => $chair->loaiGhe,
                    'status' => $chair->trangThai == 2 ? 'occupied' : '',
                    'price' => $chair->gia
                ];
            }
            $result[] = [
                'row' => $tenDayGhe,
                'seats' => $seats,
            ];
        }
        //dd($result);
        return response()->json([
            'status' => 200,
            'chairs' => $result
        ]);
    }

    public function SearchFunction(Request $request)
    {
        $q = $request->input('q');
        $filmResults = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('tenPhim', 'like', '%' . $q . '%')
            ->get();
        return view('components.user.Phim.kq-tim-kiem', compact('q', 'filmResults'));
    }
}
