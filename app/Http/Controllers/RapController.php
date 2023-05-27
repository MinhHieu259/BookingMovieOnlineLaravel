<?php

namespace App\Http\Controllers;

use App\Helpers\date;
use App\Models\ChiTietRap;
use App\Models\Phim;
use App\Models\RAP;
use App\Models\Tinh;
use Illuminate\Http\Request;

class RapController extends Controller
{
    public function ChiTietRap()
    {
        return view('components.user.Rap.chi-tiet-rap');
    }

    public function TimKiemRap()
    {
        $provinces = Tinh::all();
        return view('components.user.Rap.index', compact('provinces'));
    }

    public function GetTheaterByProvince(Request $request)
    {
        $province = $request->input('province');
        $nameTheater = $request->input('nameTheater');
        $imageTheater = Rap::first()->anhDaiDien;
        $theaters = ChiTietRap::when($province, function ($query) use ($province) {
            return $query->where('maTinh', $province);
        })
            ->when($nameTheater, function ($query) use ($nameTheater) {
                return $query->where('tenRap', 'like', '%' . $nameTheater . '%');
            })
            ->get();

        return response()->json([
            'theaters' => $theaters,
            'imageTheater' => $imageTheater,
        ]);
    }

    public function DetailTheater($slug)
    {
        $chiTietRap = ChiTietRap::where('slug', $slug)
            ->join('Tinh', 'Tinh.maTinh', '=', 'ChiTietRap.maTinh')
            ->first();
        $dates = date::getSixDayFromToday();
        $imageTheater = Rap::first()->anhDaiDien;
        return view('components.user.Rap.chi-tiet-rap', compact('chiTietRap', 'dates', 'imageTheater'));
    }

    public function GetListFilmAndTime(Request $request)
    {
        $dateActive = date("d/m/Y", strtotime($request->input('dateActive')));
        $maRap = $request->input('maRap');
        $filmAndTime = Phim::leftJoin('SuatChieu as SC', 'SC.maPhim', '=', 'PHIM.maPhim')
            ->leftJoin('PHONG', 'PHONG.maPhong', '=', 'SC.maPhong')
            ->leftJoin('ChiTietRap as CTR', 'CTR.maChiTietRap', '=', 'PHONG.maChiTietRap')
            ->leftJoin('HinhAnhPhim as HA', 'HA.maPhim', 'PHIM.maPhim')
            ->where('SC.ngayChieu', $dateActive)
            ->where('CTR.maChiTietRap', $maRap)
            ->get();
            $result2 = [];
            foreach ($filmAndTime as $result) {
                $maPhim = $result->maPhim;
                $suatChieu = [
                    'gioChieu' => $result->gioChieu,
                    'ngayChieu' => $result->ngayChieu,
                    'tenPhong' => $result->tenPhong,
                    'maSuatChieu' => $result->maSuatChieu
                ];
    
                if (!isset($result2[$maPhim])) {
                    $result2[$maPhim] = [
                        'maPhim' => $maPhim,
                        'maChiTietRap' => $result->maChiTietRap,
                        'tenRap' => $result->tenRap,
                        'diaChi' => $result->diaChi,
                        'tenPhim' => $result->tenPhim,
                        'hinhAnh' => $result->linkHinhAnh,
                        'linkTrailer' => $result->linkTrailer,
                        'gioiHanTuoi' => $result->gioiHanTuoi,
                        'thoiLuong' => $result->thoiLuong,
                        'suatChieu' => [$suatChieu]
                    ];
                } else {
                    $result2[$maPhim]['suatChieu'][] = $suatChieu;
                }
            }
            return response()->json([
                'results' => array_values($result2)
            ]);
    }
}
