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
//        try {
        $maDayGhe = $request->input('maDayGhe');
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


        for ($i = 0; $i < count($tenDayGhe); $i++) {
            if ($maDayGhe[$i] != '1' && $tenDayGhe[$i] != null) {
                $dayGhe = DayGhe::where('maDayGhe', $maDayGhe[$i])->first();
                $dayGhe->tenDayGhe = $tenDayGhe[$i];
                $dayGhe->soGheMoiDay = $soGheMoiDay[$i];
                $dayGhe->maPhong = $maPhong;
                $dayGhe->save();
            } else {
                $dayGhe = new DayGhe();
                $dayGhe->maDayGhe = '';
                $dayGhe->tenDayGhe = $tenDayGhe[$i];
                $dayGhe->soGheMoiDay = $soGheMoiDay[$i];
                $dayGhe->maPhong = $maPhong;
                $dayGhe->save();
            }
        }
        if (count(json_decode($request->arrayDelete)) > 0) {
            foreach (json_decode($request->arrayDelete) as $maDayGhe) {
                DayGhe::where('maDayGhe', $maDayGhe)->delete();
            }
        }
        DB::commit();
        return response()->json([
            'status' => 200,
            'message' => 'Cập nhật dãy ghế thành công'
        ]);
//        } catch (\Exception $e) {
//            DB::rollback();
//            return response()->json(['status' => 500, 'message' => $e->getMessage()]);
//        }
    }

    public function GetListDayGhe($maPhong)
    {
        $dayGhes = DayGhe::where('maPhong', $maPhong)->get();
        return response()->json([
            'status' => 200,
            'dayGhe' => $dayGhes
        ]);
    }

    public function checkDayGhe($maPhong, $tenDayGhe)
    {
        $dayGhe = DayGhe::where('maPhong', $maPhong)
            ->where('tenDayGhe', $tenDayGhe)->first();
        if ($dayGhe) {
            return response()->json([
                'status' => 200,
                'checkexist' => true
            ]);
        }
    }
}
