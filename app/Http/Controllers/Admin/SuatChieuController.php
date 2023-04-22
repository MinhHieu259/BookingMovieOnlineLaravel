<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuatChieu\AddSuatChieu;
use App\Models\ChiTietRap;
use App\Models\Phim;
use App\Models\Phong;
use App\Models\SuatChieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuatChieuController extends Controller
{
    public function index($maPhim)
    {
        $phim = Phim::where('maPhim', $maPhim)->first();
        return view('components.admin.suat-chieu.danh-sach-suat-chieu', compact('phim'));
    }

    public function add($maPhim)
    {
        $phim = Phim::where('maPhim', $maPhim)->first();
        $cumRaps = ChiTietRap::where('deleted', '<>', 2)->get();
        return view('components.admin.suat-chieu.them-moi-lich-chieu', compact('phim', 'cumRaps'));
    }

    public function onChangeCumRap($maCumRap)
    {
        $rooms = Phong::where('maChiTietRap', $maCumRap)->where('deleted', 1)->get();
        return response()->json([
            'status' => 200,
            'rooms' => $rooms
        ]);
    }

    public function validate(AddSuatChieu $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Các trường bạn nhập chưa đúng yêu cầu',
                'errors' => $validator->errors(),
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Hiển thị popup'
            ]);
        }
    }

    public function store(Request $request)
    {
        $suatChieu = new SuatChieu();
        DB::beginTransaction();
        try {
            $suatChieu::create([
                'ngayChieu' => $request->input('ngayChieu'),
                'gioChieu' => $request->input('gioChieu'),
                'maPhim' => $request->input('maPhim'),
                'maPhong' => $request->input('phongChieu')
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm mới suất chiếu thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => $e
            ]);
        }
    }
}
