<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuDat;
use Illuminate\Http\Request;

class DatVeController extends Controller
{
    public function ManagerTicketView()
    {
        return view('components.admin.dat-ve.danh-sach');
    }

    public function SearchOrder(Request $request)
    {
        $trangThai = $request->input('trangThai');
        $ngayDat = $request->input('ngayDat');

        $results = LichSuDat::when($trangThai, function ($query) use ($trangThai) {
            return $query->where('trangThai', $trangThai);
        })
            ->when($ngayDat, function ($query) use ($ngayDat) {
                return $query->where('thoiGianDat','like', '%'.$ngayDat.'%');
            })
            ->get();
        return $results;
    }
}
