<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\ChiTietLichSu;
use App\Models\LichSuDat;
use App\Models\NguoiDung;
use App\Models\RAP;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UpdateUserView()
    {
        return view('components.user.NguoiDung.thong-tin-tai-khoan');
    }

    public function UpdateUser(UpdateUserRequest $request)
    {
        try {
            $nguoiDung = NguoiDung::find(Auth::guard('nguoidung')->user()->maNguoiDung);
            $nguoiDung->hoVaTen = $request->input('hoVaTen');
            $nguoiDung->soDienThoai = $request->input('soDienThoai');

            if ($request->hasFile('user_avatar')) {
                if (file_exists($nguoiDung->anhDaiDien)) {
                    unlink($nguoiDung->anhDaiDien);
                }

                $file = $request->file('user_avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                $file->move('uploads/user/', $filename);

                $nguoiDung->anhDaiDien = 'uploads/user/' . $filename;
            }
            $nguoiDung->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thông tin thành công',
                'user' => $nguoiDung
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 200,
                'message' => 'Lỗi hệ thống'
            ]);
        }
    }

    public function NapTienView()
    {
        $user = Auth::guard('nguoidung')->user();
        return view('components.user.NapTien.nap-tien', compact('user'));
    }

    public function PhuongThucNap($soTien)
    {
        $soTienView = '';
        $user = Auth::guard('nguoidung')->user();
        switch ($soTien) {
            case 'goi-100k':
                $soTienView = '100000';
                break;
            case 'goi-200k':
                $soTienView = '200000';
                break;
            case 'goi-500k':
                $soTienView = '500000';
                break;
            case 'goi-1tr':
                $soTienView = '1000000';
                break;
        }
        return view('components.user.NapTien.phuong-thuc-nap', compact('soTienView', 'user'));
    }

    public function HistoryOrderView()
    {
        $rap = RAP::all()[0];
        return view('components.user.NguoiDung.lich-su-mua-ve', compact('rap'));
    }

    public function GetListOrder($status)
    {
        $statusWhere = $status == 'yes' ? '2' : '1';
        $listOrders = LichSuDat::join('SuatChieu as SC', 'SC.maSuatChieu', '=', 'LichSuDat.maSuatChieu')
            ->join('PHONG', 'PHONG.maPhong', '=', 'SC.maPhong')
            ->join('ChiTietRap as CTR', 'CTR.maChiTietRap', '=', 'PHONG.maChiTietRap')
            ->join('NguoiDung as ND', 'ND.maNguoiDung', '=', 'LichSuDat.maNguoiDung')
            ->join('PHIM', 'PHIM.maPhim', '=', 'SC.maPhim')
            ->select('LichSuDat.*', 'ND.username', 'PHONG.tenPhong', 'CTR.tenRap', 'SC.gioChieu', 'SC.ngayChieu', 'PHIM.tenPhim')
            ->where('LichSuDat.trangThai', $statusWhere)
            ->where('LichSuDat.maNguoiDung', Auth::guard('nguoidung')->user()->maNguoiDung)
            ->get();
        return response()->json([
            'data' => $listOrders
        ]);
    }

    public function DetailOrder($maLichSu)
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
        return view('components.user.NguoiDung.chi-tiet-mua-ve', compact('lichSu', 'chiTietLichSu', 'seatValues'));
    }
}
