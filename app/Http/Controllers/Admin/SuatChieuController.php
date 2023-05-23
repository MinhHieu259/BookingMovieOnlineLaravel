<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuatChieu\AddSuatChieu;
use App\Http\Requests\Admin\SuatChieu\UpdateSuatChieuRequest;
use App\Models\ChiTietDayGhe;
use App\Models\ChiTietRap;
use App\Models\DayGhe;
use App\Models\Phim;
use App\Models\Phong;
use App\Models\SuatChieu;
use Carbon\Carbon;
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

    public function listSuatChieuToTable($maPhim)
    {
        $suatChieus = DB::table('SuatChieu')
            ->leftJoin('PHONG', 'SuatChieu.maPhong', '=', 'PHONG.maPhong')
            ->leftJoin('ChiTietRap', 'PHONG.maChiTietRap', '=', 'ChiTietRap.maChiTietRap')
            ->select('SuatChieu.*', 'ChiTietRap.tenRap', 'PHONG.tenPhong')
            ->where('SuatChieu.maPhim', $maPhim)
            ->where('SuatChieu.deleted', '1')
            ->get();
        return response()->json([
            'status' => 200,
            'suatChieus' => $suatChieus
        ]);
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

    public function validateSuatChieu(AddSuatChieu $request)
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

    public function storeSuatChieu(Request $request)
    {
        $suatChieu = new SuatChieu();
        DB::beginTransaction();
        try {
            if (SuatChieu::where('ngayChieu', $request->input('ngayChieu'))
                ->where('gioChieu', $request->input('gioChieu'))
                ->where('maPhim', $request->input('maPhim'))->where('maPhong', $request->input('phongChieu'))->first()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Suất chiếu đã tồn tại'
                ]);
            } else {
                $phim = Phim::where('maPhim', $request->input('maPhim'))->first();
                $ngayKhoiChieuFormat = Carbon::createFromFormat('d/m/Y', $phim->ngayKhoiChieu);
                $ngayChieuFormat = Carbon::createFromFormat('d/m/Y', $request->input('ngayChieu'));
                if ($ngayChieuFormat->gte($ngayKhoiChieuFormat)){
                    $suatChieu::create([
                        'maSuatChieu' => '',
                        'ngayChieu' => $request->input('ngayChieu'),
                        'gioChieu' => $request->input('gioChieu'),
                        'maPhim' => $request->input('maPhim'),
                        'maPhong' => $request->input('phongChieu')
                    ]);
                    DB::commit();
                    //get maSuatChieu sau khi insert
                    $newSuatChieu = SuatChieu::where('maPhim', $request->input('maPhim'))->orderBy('maSuatChieu', 'DESC')->get();
                    $maSuatChieu = $newSuatChieu[0]->maSuatChieu;
                    //Thêm data vào dãy ghế
                    // Lấy thông tin các dãy ghế của phòng
                    $chairs = DayGhe::where('maPhong', $request->input('phongChieu'))->get();
                    $numDayGhe = count($chairs);
                    foreach ($chairs as $index => $chair) {
                        $loaiGhe = $index + 1 == $numDayGhe ? 'double' : '';
                        $gia = $index + 1 == $numDayGhe ? '2' : '1';
                        for ($i = 0; $i < (int)$chair->soGheMoiDay; $i++) {
                            $indexGhe = $i + 1;
                            $chiTietDayGhe = new ChiTietDayGhe();
                            $chiTietDayGhe::create([
                                'maChiTietDayGhe' => '',
                                'maDayGhe' => $chair->maDayGhe,
                                'tenGhe' => $chair->tenDayGhe . $indexGhe,
                                'loaiGhe' => $loaiGhe,
                                'gia' => $gia,
                                'trangThai' => 1,
                                'maSuatChieu' => $maSuatChieu
                            ]);
                            DB::commit();
                        }
                    }
                    return response()->json([
                        'status' => 200,
                        'message' => 'Thêm mới suất chiếu thành công',
                        'chairs' => $chairs
                    ]);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => 'Ngày chiếu phim phải lớn hơn hoặc bằng ngày khởi chiếu'
                    ]);
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => $e
            ]);
        }
    }

    public function deleteSuatChieu($maSuatChieu)
    {
        DB::beginTransaction();
        try {
            $suatChieu = SuatChieu::where('maSuatChieu', $maSuatChieu)->first();
            $suatChieu->deleted = 2;
            $suatChieu->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Xóa suất chiếu thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => $e
            ]);
        }
    }

    public function editLichChieu($maSuatChieu)
    {
        $suatChieu = DB::table('SuatChieu')
            ->leftJoin('PHONG', 'SuatChieu.maPhong', '=', 'PHONG.maPhong')
            ->leftJoin('ChiTietRap', 'PHONG.maChiTietRap', '=', 'ChiTietRap.maChiTietRap')
            ->select('SuatChieu.*', 'ChiTietRap.tenRap', 'PHONG.tenPhong', 'ChiTietRap.maChiTietRap', 'PHONG.maPhong')
            ->where('SuatChieu.maSuatChieu', $maSuatChieu)
            ->where('SuatChieu.deleted', '1')
            ->first();
        $cumRaps = ChiTietRap::where('deleted', '<>', 2)->get();
        $phim = Phim::where('maPhim', $suatChieu->maPhim)->first();
        return view('components.admin.suat-chieu.cap-nhat-suat-chieu', compact('suatChieu', 'cumRaps', 'phim'));
    }

    public function validateUpdate(UpdateSuatChieuRequest $request)
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

    function updateSuatChieu(Request $request, $maSuatChieu)
    {
        DB::beginTransaction();
        try {
            $suatChieu = SuatChieu::where('maSuatChieu', $maSuatChieu)->first();
            $suatChieu->ngayChieu = $request->input('ngayChieu');
            $suatChieu->gioChieu = $request->input('gioChieu');
            $suatChieu->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật suất chiếu thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => $e
            ]);
        }

    }

    public function detailChair($maPhong, $maSuatChieu)
    {
        return view('components.admin.suat-chieu.chi-tiet-ghe');
    }

    public function getListChair($maSuatChieu)
    {
        $chairs = DB::table('ChiTietDayGhe')
            ->leftJoin('SuatChieu', 'ChiTietDayGhe.maSuatChieu', '=', 'SuatChieu.maSuatChieu')
            ->leftJoin('DayGhe', 'ChiTietDayGhe.maDayGhe', '=', 'DayGhe.maDayGhe')
            ->select('ChiTietDayGhe.*', 'DayGhe.tenDayGhe')
            ->where('ChiTietDayGhe.maSuatChieu', $maSuatChieu)
            ->get();
        // Nhóm các hàng theo tên của dãy ghế
        $groups = $chairs->groupBy('tenDayGhe');
        // Xây dựng lại mảng
        $result = [];
        foreach ($groups as $tenDayGhe => $chairs) {
            $seats = [];
            foreach ($chairs as $chair) {
                $seats[] = [
                    'name' => $chair->tenGhe,
                    'type' => $chair->loaiGhe,
                    'status' => $chair->trangThai == 2 ? 'occupied' : '',
                ];
            }
            $result[] = [
                'row' => $tenDayGhe,
                'seats' => $seats,
            ];
        }
        return response()->json([
            'status' => 200,
            'chairs' => $result
        ]);
    }
}
