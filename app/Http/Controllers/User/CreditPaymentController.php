<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDayGhe;
use App\Models\ChiTietLichSu;
use App\Models\LichSuDat;
use App\Models\Phim;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CreditPaymentController extends Controller
{
    public function CreditPayment(Request $request, $maSuatChieu)
    {
            $timeBook = Carbon::now()->format('d/m/y H:i:s');
            $lichSuDat = new LichSuDat();
            $lichSuDat->maLichSu = '';
            $lichSuDat->thoiGianDat = $timeBook;
            $lichSuDat->tienDat = $request->input('orderMoney');
            $lichSuDat->maNguoiDung = Auth::guard('nguoidung')->user()->maNguoiDung;
            $lichSuDat->loaiThanhToan = 'credit';
            $lichSuDat->maSuatChieu = $maSuatChieu;
            $lichSuDat->save();

            $lichSuAfter = LichSuDat::where('thoiGianDat', $timeBook)
                ->where('tienDat', $request->input('orderMoney'))
                ->where('maNguoiDung', Auth::guard('nguoidung')->user()->maNguoiDung)
                ->first();

            $phim = Phim::where('maPhim', $request->input('maPhim'))->first();
            //dd(json_decode($request->input('listSeats')));
            if (count(json_decode($request->input('listSeats'))) > 0){
                foreach (json_decode($request->input('listSeats')) as $seat) {
                    $ve = new Ve();
                    $ve->maVe = '';
                    $ve->giaVe = $seat->seatPrice * $phim->giaVe;
                    $ve->loaiVe = $seat->seatType;
                    $ve->tenGhe = $seat->seatName;
                    $ve->maPhim = $request->input('maPhim');
                    $ve->maPhong = $request->input('maPhong');
                    $ve->maLichSu = $lichSuAfter->maLichSu;
                    $ve->save();

                    $chiTietDayGhe = ChiTietDayGhe::where('maSuatChieu', $maSuatChieu)
                        ->where('tenGhe', $seat->seatName)->first();
                    $chiTietDayGhe->trangThai = '2';
                    $chiTietDayGhe->save();
                }
            }

            if (count(json_decode($request->input('foods'))) > 0){
                foreach (json_decode($request->input('foods')) as $food){
                    $ctLichSu = new ChiTietLichSu();
                    $ctLichSu->maChiTiet = '';
                    $ctLichSu->tenDoAn = $food->tenDoAn;
                    $ctLichSu->giaDoAn = $food->gia;
                    $ctLichSu->soLuong = $food->quantity;
                    $ctLichSu->maLichSu = $lichSuAfter->maLichSu;
                    $ctLichSu->save();
                }
            }
            return response()->json([
                'maLichSu' => base64_encode($lichSuAfter->maLichSu)
            ]);
    }
}
