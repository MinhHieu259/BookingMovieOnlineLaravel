<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LichSuDat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;

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
            foreach ($lichSuDat as $item){
                $total += (double)$item->tienDat;
            }
            $listDoanhThu[] = $total;
            $startMonth->addMonth();
        }

        return response()->json([
            'listMonth' => $listMonth,
            'listDoanhThu' => $listDoanhThu
        ]);
    }
}
