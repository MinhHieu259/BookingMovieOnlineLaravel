<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DayGhe;
use Illuminate\Http\Request;

class DayGheController extends Controller
{
    public function ListDayGhe($maCum, $maPhong)
    {
        $dayghes = DayGhe::where('maPhong', $maPhong)->get();
        return view('components.admin.day-ghe.them-moi-day-ghe', compact('dayghes'));
    }

    public function AddDayGhe(Request $request, $maPhong)
    {
        $tenDayGhe = $request->input('tenDayGhe');
        $soGheMoiDay = $request->input('soGheMoiDay');
        $deleteDayGhe = DayGhe::where('maPhong', $maPhong)->delete();
        for ($i = 0; $i < count($tenDayGhe); $i++) {
            $dayGhe = new DayGhe();
            $dayGhe->maDayGhe = '';
            $dayGhe->tenDayGhe = $tenDayGhe[$i];
            $dayGhe->soGheMoiDay = $soGheMoiDay[$i];
            $dayGhe->maPhong = $maPhong;
            $dayGhe->save();
        }
        return response()->json(['success' => true]);
    }
}
