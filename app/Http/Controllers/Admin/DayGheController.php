<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DayGhe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DayGheController extends Controller
{
    public function ListDayGhe($maCum, $maPhong)
    {
        $dayghes = DayGhe::where('maPhong', $maPhong)->get();
        return view('components.admin.day-ghe.them-moi-day-ghe', compact('dayghes'));
    }

    public function AddDayGhe(Request $request, $maPhong)
    {
        DB::beginTransaction();

        try {
            $tenDayGhe = $request->input('tenDayGhe');
            $soGheMoiDay = $request->input('soGheMoiDay');

            if (empty($tenDayGhe) && empty($soGheMoiDay)) {
                DayGhe::where('maPhong', $maPhong)->delete();
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => 'Cập nhật dãy ghế thành công'
                ]);
            }

            $deleteDayGhe = DayGhe::where('maPhong', $maPhong)->delete();
            for ($i = 0; $i < count($tenDayGhe); $i++) {
                $dayGhe = new DayGhe();
                $dayGhe->maDayGhe = '';
                $dayGhe->tenDayGhe = $tenDayGhe[$i];
                $dayGhe->soGheMoiDay = $soGheMoiDay[$i];
                $dayGhe->maPhong = $maPhong;
                $dayGhe->save();
            }

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật dãy ghế thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function GetListDayGhe($maPhong)
    {
        $dayGhes = DayGhe::where('maPhong', $maPhong)->get();
        return response()->json([
            'status' => 200,
            'dayGhe' => $dayGhes
        ]);
    }
}
