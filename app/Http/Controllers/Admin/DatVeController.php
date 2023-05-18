<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietLichSu;
use App\Models\ChiTietRap;
use App\Models\LichSuDat;
use App\Models\Phim;
use App\Models\Ve;
use Illuminate\Http\Request;

class DatVeController extends Controller
{
    public function ManagerTicketView()
    {
        $theaters = ChiTietRap::all();
        $films = Phim::all();
        return view('components.admin.dat-ve.danh-sach', compact('theaters', 'films'));
    }

    public function SearchOrder(Request $request)
    {
        $trangThai = $request->input('trangThai');
        $ngayDat = $request->input('ngayDat');
        $cumRap = $request->input('cumRap');
        $maPhim = $request->input('maPhim');

        $results = LichSuDat::join('SuatChieu as SC', 'SC.maSuatChieu', '=', 'LichSuDat.maSuatChieu')
            ->join('PHONG', 'PHONG.maPhong', '=', 'SC.maPhong')
            ->join('ChiTietRap as CTR', 'CTR.maChiTietRap', '=', 'PHONG.maChiTietRap')
            ->join('NguoiDung as ND', 'ND.maNguoiDung', '=', 'LichSuDat.maNguoiDung')
            ->join('PHIM', 'PHIM.maPhim', '=', 'SC.maPhim')
            ->select('LichSuDat.*', 'ND.username', 'PHONG.tenPhong', 'CTR.tenRap')
            ->when($trangThai, function ($query) use ($trangThai) {
                return $query->where('LichSuDat.trangThai', $trangThai);
            })
            ->when($ngayDat, function ($query) use ($ngayDat) {
                return $query->where('thoiGianDat', 'like', '%' . $ngayDat . '%');
            })
            ->when($cumRap, function ($query) use ($cumRap) {
                return $query->where('CTR.maChiTietRap', $cumRap);
            })
            ->when($maPhim, function ($query) use ($maPhim) {
                return $query->where('PHIM.maPhim', $maPhim);
            })
            ->get();
        return $results;
    }

    public function OrderDetail($maLichSu)
    {
        $lichSu = LichSuDat::join('SuatChieu as SC', 'SC.maSuatChieu', '=', 'LichSuDat.maSuatChieu')
            ->join('PHONG', 'PHONG.maPhong', '=', 'SC.maPhong')
            ->join('ChiTietRap as CTR', 'CTR.maChiTietRap', '=', 'PHONG.maChiTietRap')
            ->join('NguoiDung as ND', 'ND.maNguoiDung', '=', 'LichSuDat.maNguoiDung')
            ->join('PHIM', 'PHIM.maPhim', '=', 'SC.maPhim')
            ->select('LichSuDat.*', 'ND.username', 'PHONG.tenPhong', 'CTR.tenRap', 'PHIM.tenPhim')
            ->where('maLichSu', $maLichSu)
            ->first();
        $chiTietLichSu = ChiTietLichSu::join('LichSuDat as LSD', 'LSD.maLichSu', '=', 'ChiTietLichSu.maLichSu')
            ->where('ChiTietLichSu.maLichSu', $maLichSu)
            ->select('ChiTietLichSu.*')
            ->get();
        $tickets = Ve::where('maLichSu', $maLichSu)
            ->select('tenGhe')
            ->get();
        $seats = [];
        foreach ($tickets as $ticket){
            $seats[] = $ticket->tenGhe;
        }
        $seatValues = count($seats) > 0 ? implode(', ', $seats) : $seats[0];
        return view('components.admin.dat-ve.chi-tiet-dat-ve', compact('lichSu', 'chiTietLichSu', 'seatValues'));
    }
}
