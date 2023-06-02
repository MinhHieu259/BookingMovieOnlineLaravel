<?php

namespace App\Http\Controllers;

use App\Helpers\date;
use App\Models\ChiTietDayGhe;
use App\Models\ChiTietRap;
use App\Models\DanhMucPhim;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\DoAn;
use App\Models\NgonNgu;
use App\Models\Phim;
use App\Models\PostModel;
use App\Models\RAP;
use App\Models\SuatChieu;
use App\Models\Tinh;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhimController extends Controller
{
    public function DangChieu()
    {
        $currentDate = Carbon::now()->format('d/m/Y');
        $films = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('PHIM.deleted', '1')
            ->whereRaw("CONVERT(DATE, ngayKhoiChieu, 103) < CONVERT(DATE, '{$currentDate}', 103)")
            ->get();
        $categorys = DanhMucPhim::all();
        $ngonNgus = NgonNgu::all();
        return view('components.user.Phim.dang-chieu', compact('films', 'categorys', 'ngonNgus'));
    }

    public function GetListDangChieu(Request $request)
    {
        $currentDate = Carbon::now()->format('d/m/Y');
        $maDanhMuc = $request->input('danhMuc');
        $ngonNgu = $request->input('ngonNgu');
        $films = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('PHIM.deleted', '1')
            ->whereRaw("CONVERT(DATE, ngayKhoiChieu, 103) < CONVERT(DATE, '{$currentDate}', 103)")
            ->when($maDanhMuc, function ($query) use ($maDanhMuc) {
                return $query->where('maDanhMuc', $maDanhMuc);
            })
            ->when($ngonNgu, function ($query) use ($ngonNgu) {
                return $query->where('maNgonNgu', $ngonNgu);
            })
            ->get();
        return response()->json([
            'films' => $films,
        ]);
    }

    public function SapChieu()
    {
        $currentDate = Carbon::now()->format('d/m/Y');
        $films = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('PHIM.deleted', '1')
            ->whereRaw("CONVERT(DATE, ngayKhoiChieu, 103) > CONVERT(DATE, '{$currentDate}', 103)")
            ->get();
        $categorys = DanhMucPhim::all();
        $ngonNgus = NgonNgu::all();
        return view('components.user.Phim.sap-chieu', compact('films', 'categorys', 'ngonNgus'));
    }

    public function GetListSapChieu(Request $request)
    {
        $currentDate = Carbon::now()->format('d/m/Y');
        $maDanhMuc = $request->input('danhMuc');
        $ngonNgu = $request->input('ngonNgu');
        $films = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('PHIM.deleted', '1')
            ->whereRaw("CONVERT(DATE, ngayKhoiChieu, 103) > CONVERT(DATE, '{$currentDate}', 103)")
            ->when($maDanhMuc, function ($query) use ($maDanhMuc) {
                return $query->where('maDanhMuc', $maDanhMuc);
            })
            ->when($ngonNgu, function ($query) use ($ngonNgu) {
                return $query->where('maNgonNgu', $ngonNgu);
            })
            ->get();
        return response()->json([
            'films' => $films,
        ]);
    }

    public function MuaVe()
    {
        return view('components.user.Phim.mua-ve');
    }

    public function ThongTinPhim($slug)
    {
        $film = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->join('DanhMucPhim as DM', 'DM.maDanhMuc', '=', 'PHIM.maDanhMuc')
            ->where('slug', $slug)
            ->select('PHIM.*', 'HA.linkHinhAnh', 'DM.tenDanhMuc')
            ->first();
        $actors = DienVien::whereIn('maDienVien', json_decode($film->maDienVien))->get();
        $directors = DaoDien::whereIn('maDaoDien', json_decode($film->maDaoDien))->get();
        $postRelate = PostModel::where('maPhim', $film->maPhim)
            ->leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
            ->where('deleted', '1')
            ->get();
        return view('components.user.Phim.thong-tin-phim', compact('film', 'actors', 'directors', 'postRelate'));
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
                'maSuatChieu' => $result->maSuatChieu,
            ];

            if (!isset($result2[$maCTRap])) {
                $result2[$maCTRap] = [
                    'maCTRap' => $maCTRap,
                    'tenRap' => $result->tenRap,
                    'diaChi' => $result->diaChi,
                    'suatChieu' => [$suatChieu],
                ];
            } else {
                $result2[$maCTRap]['suatChieu'][] = $suatChieu;
            }
        }
        return response()->json([
            'rap' => $rap,
            'results' => array_values($result2),
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
                    'price' => $chair->gia,
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
            'chairs' => $result,
        ]);
    }

    public function SearchFunction(Request $request)
    {
        $q = $request->input('q');
        $filmResults = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->where('tenPhim', 'like', '%' . $q . '%')
            ->get();
        $postResults = PostModel::leftjoin('PHIM', 'PHIM.maPhim', '=', 'BaiViet.maPhim')
            ->leftJoin('DanhMucPhim as DM', 'DM.maDanhMuc', 'PHIM.maDanhMuc')
            ->leftJoin('Admin as AM', 'AM.maAdmin', 'BaiViet.maNguoiDang')
            ->where('tieuDe', 'like', '%' . $q . '%')
            ->orWhere('moTa', 'like', '%' . $q . '%')
            ->orWhere('noiDung', 'like', '%' . $q . '%')
            ->select('DM.*',
                'AM.*',
                'BaiViet.tieuDe',
                'BaiViet.moTa',
                'BaiViet.thoiGianDang',
                'BaiViet.slug as postSlug',
                'BaiViet.hinhAnh')
            ->get();
        return view('components.user.Phim.kq-tim-kiem', compact('q', 'filmResults', 'postResults'));
    }
}
