<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChiTietRap;
use App\Models\LichSuDat;
use App\Models\Phim;
use App\Models\SuatChieu;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function InformationTicket($maLichSu)
    {
        $lichSuDat = LichSuDat::join('NguoiDung as ND', 'ND.maNguoiDung', '=', 'LichSuDat.maNguoiDung')
        ->join('VE', 'VE.maLichSu', '=', 'LichSuDat.maLichSu')
        ->join('PHONG', 'PHONG.maPhong', '=', 'VE.maPhong')
        ->select('LichSuDat.*', 'VE.*', 'PHONG.tenPhong')
        ->where('LichSuDat.maLichSu', base64_decode($maLichSu))
        ->get();
        $phim = Phim::where('maPhim', $lichSuDat[0]->maPhim)->first();
        $chiTietRap = ChiTietRap::join('PHONG', 'PHONG.maChiTietRap', '=', 'ChiTietRap.maChiTietRap')
        ->where('PHONG.maPhong', $lichSuDat[0]->maPhong)
        ->first();
        $veArray = [];
        foreach ($lichSuDat as $value){
            $ghe = [
                'tenGhe' => $value->tenGhe,
                'loaiGhe' => $value->loaiVe == 'double' ? 'Ghế đôi' : 'Ghê đơn'
            ];

            $veArray['ghe'][] = $ghe;
            $veArray['gheDisplay'][] = $value->tenGhe;
        }

        $thongTinDonHang = [
            'thoiGianDat' => $lichSuDat[0]->thoiGianDat,
            'tienDat' => $lichSuDat[0]->tienDat,
            'loaiThanhToan' => $lichSuDat[0]->loaiThanhToan,
            'soVe' => count($lichSuDat),
            'veInfor' => $veArray
        ];
        $suatChieu = SuatChieu::join('LichSuDat as LSD', 'LSD.maSuatChieu', '=', 'SuatChieu.maSuatChieu')
        ->where('SuatChieu.maSuatChieu', $lichSuDat[0]->maSuatChieu)
        ->get();
        $dataDonHang = response()->json([
            'tenPhim' => $phim->tenPhim,
            'rap' => [
                'tenRap' => $chiTietRap->tenRap,
                'diaChi' => $chiTietRap->diaChi
            ],
            'thongTinDonHang' => $thongTinDonHang,
            'suatChieu' => $suatChieu
        ]);
        $jsonData = $dataDonHang->getData();
        //return $jsonData;
        return view('components.user.LichChieu.dat-ve-thanh-cong', ['dataDonHang' => $jsonData]);
    }
}
