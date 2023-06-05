<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuDat;
use App\Models\NguoiDung;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function ThongKeDoanhThu()
    {
        return view('components.admin.thong-ke.thong-ke-doanh-thu');
    }

    public function GetDataDoanhThu(Request $request)
    {
        $tuThang = $request->input('tuThang');
        $denThang = $request->input('denThang');
        $startMonth = Carbon::createFromFormat('m/Y', $tuThang);
        $endMonth = Carbon::createFromFormat('m/Y', $denThang);
        $listMonth = [];
        $listDoanhThu = [];
        while ($startMonth->lte($endMonth)) {
            $month = $startMonth->format('m/Y');
            $listMonth[] = $month;
            $lichSuDat = LichSuDat::where('thangDat', $month)->get();
            $total = 0;
            foreach ($lichSuDat as $item) {
                $total += (double) $item->tienDat;
            }
            $listDoanhThu[] = $total;
            $startMonth->addMonth();
        }

        return response()->json([
            'listMonth' => $listMonth,
            'listDoanhThu' => $listDoanhThu,
        ]);
    }

    public function ThongKeXuHuong()
    {
        $films = Phim::all();
        return view('components.admin.thong-ke.thong-ke-xu-huong', compact('films'));
    }

    public function GetDataXuHuong(Request $request)
    {
        if ($request->input('tieuChi') == '1') {
            $ageGroups = [
                ['name' => '18-34', 'minAge' => 18, 'maxAge' => 34],
                ['name' => '35-54', 'minAge' => 35, 'maxAge' => 54],
                ['name' => '55-70', 'minAge' => 55, 'maxAge' => 70]
            ];
            $statistics = [];
            foreach ($ageGroups as $ageGroup) {
                $usersCount = LichSuDat::leftJoin('NguoiDung', 'LichSuDat.maNguoiDung', '=', 'NguoiDung.maNguoiDung')
                ->leftJoin('PHIM', 'LichSuDat.maPhim', '=', 'PHIM.maPhim')
                ->where('PHIM.maPhim', $request->input('maPhim'))
                ->whereHas('NguoiDung', function ($query) use ($ageGroup) {
                    $query->whereRaw('DATEDIFF(YEAR, NguoiDung.ngaySinh, GETDATE()) BETWEEN ? AND ?', [$ageGroup['minAge'], $ageGroup['maxAge']]);
                })->count();
            
                $statistics[] = [
                    'ageGroup' => $ageGroup['name'],
                    'usersCount' => $usersCount
                ];
            }
            $totalUsers = LichSuDat::where('maPhim', $request->input('maPhim'))->count();
            foreach ($statistics as &$stat) {
                $stat['percentage'] = $stat['usersCount'] > 0 ? ($stat['usersCount'] / $totalUsers) * 100 : 0;
            }
            $label = [];
            $data = [];
            foreach($statistics as $value){
                $label[] = $value['ageGroup'];
                $data[] = $value['percentage'];
            }
           
            return response()->json([
                'label' => $label,
                'data' => $data
            ]);
            
        } else {
            $genderGroups = [
                ['name' => 'Nam', 'gender' => 1],
                ['name' => 'Nữ', 'gender' => 2]
            ];
            $statistics = [];
            foreach ($genderGroups as $genderGroup) {
                $usersCount = LichSuDat::leftJoin('NguoiDung', 'LichSuDat.maNguoiDung', '=', 'NguoiDung.maNguoiDung')
                ->leftJoin('PHIM', 'LichSuDat.maPhim', '=', 'PHIM.maPhim')
                ->where('PHIM.maPhim', $request->input('maPhim'))
                ->whereHas('NguoiDung', function ($query) use ($genderGroup) {
                    $query->where('NguoiDung.gioiTinh', $genderGroup['gender']);
                })->count();
            
                $statistics[] = [
                    'genderGroup' => $genderGroup['name'],
                    'usersCount' => $usersCount
                ];
            }
            $totalUsers = LichSuDat::where('maPhim', $request->input('maPhim'))->count();
            foreach ($statistics as &$stat) {
                $stat['percentage'] = $stat['usersCount'] > 0 ? ($stat['usersCount'] / $totalUsers) * 100 : 0;
            }
            $label = [];
            $data = [];
            foreach($statistics as $value){
                $label[] = $value['genderGroup'];
                $data[] = $value['percentage'];
            }
           
            return response()->json([
                'label' => $label,
                'data' => $data
            ]);
        }
    }
}
