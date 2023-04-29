<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Phim\AddFilmRequest;
use App\Models\ChiTietDaoDien;
use App\Models\ChiTietDienVien;
use App\Models\ChiTietNSX;
use App\Models\DanhMucPhim;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\HinhAnhPhim;
use App\Models\NhaSanXuat;
use App\Models\Phim;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PhimController extends Controller
{
    public function AddFilm()
    {
        $dienviens = DienVien::where('deleted', '<>', '2')->get();
        $nhasxs = NhaSanXuat::where('deleted', '<>', '2')->get();
        $daodiens = DaoDien::where('deleted', '<>', '2')->get();
        $danhmucs = DanhMucPhim::where('deleted', '<>', '2')->get();
        return view('components.admin.phim.add-phim', compact('dienviens', 'nhasxs', 'daodiens', 'danhmucs'));
    }

    public function ListFilm()
    {
        return view('components.admin.phim.danh-sach-phim');
    }

    public function ListFilmToTable()
    {
        $phims = Phim::where('deleted', '<>', '2')->get();
        return response()->json([
            'status' => 200,
            'data' => $phims
        ]);
    }

    public function ValidateFilm(AddFilmRequest $request)
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

    public function InsertFilm(AddFilmRequest $request)
    {
        try {
            $phim = new Phim();
            $phim->maPhim = '';
            $phim->tenPhim = $request->input('tenPhim');
            $phim->ngayKhoiChieu = $request->input('ngayKhoiChieu');
            $phim->moTaPhim = $request->input('moTa');
            $phim->linkTrailer = $request->input('Trailer');
            $phim->maDanhMuc = $request->input('danhMuc');
            $phim->giaVe = $request->input('giaVe');
            $phim->maDienVien = json_encode(explode(',', $request->input('dienVien')));
            $phim->maDaoDien = json_encode(explode(',', $request->input('daoDien')));
            $phim->maNhaSanXuat = json_encode(explode(',', $request->input('nhaSanXuat')));
            $phim->slug = (new Slugify())->slugify($request->input('tenPhim'));
            $phim->save();
            //Get maPhim sau khi insert
            $newPhim = Phim::orderBy('maPhim', 'DESC')->get();
            $maPhim = $newPhim[0]->maPhim;

            //Insert data dienvien
//            $arrayDienVien = explode(",", $request->input('dienVien'));
//            if (count($arrayDienVien) > 0) {
//                foreach ($arrayDienVien as $index => $dienvien) {
//                    $dienVien = new ChiTietDienVien();
//                    $dienVien->maChiTiet = '';
//                    $dienVien->maPhim = $maPhim;
//                    $dienVien->maDienVien = $dienvien;
//                    $dienVien->save();
//                }
//            }
//
//            $arrayNSX = explode(",", $request->input('nhaSanXuat'));
//            if (count($arrayNSX) > 0) {
//                foreach ($arrayNSX as $index => $nsx) {
//                    $nhaSX = new ChiTietNSX();
//                    $nhaSX->maChiTiet = '';
//                    $nhaSX->maPhim = $maPhim;
//                    $nhaSX->maNhaSanXuat = $nsx;
//                    $nhaSX->save();
//                }
//            }
//
//            $arrayDaoDien = explode(",", $request->input('daoDien'));
//            if (count($arrayDaoDien) > 0) {
//                foreach ($arrayDaoDien as $index => $daodien) {
//                    $daoDien = new ChiTietDaoDien();
//                    $daoDien->maChiTiet = '';
//                    $daoDien->maPhim = $maPhim;
//                    $daoDien->maDaoDien = $daodien;
//                    $daoDien->save();
//                }
//            }

            if ($request->hasFile('hinhAnh')) {
                if (count($request->file('hinhAnh')) > 0) {
                    foreach ($request->file('hinhAnh') as $index => $hinhanh) {
                        $hinhAnh = new HinhAnhPhim();
                        $file = $hinhanh;
                        $extension = $file->getClientOriginalExtension();
                        $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                        $file->move('uploads/phim/', $filename);

                        $hinhAnh->maHinhAnh = '';
                        $hinhAnh->maPhim = $maPhim;
                        $hinhAnh->linkHinhAnh = 'uploads/phim/' . $filename;
                        $hinhAnh->save();
                    }
                }
            }

            if ($phim->wasRecentlyCreated) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Thêm mới phim thành công'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function DeletePhim($maPhim)
    {
        $results = Phim::DeletePhim($maPhim);
        if ($results[0]->result == 1) {
            return response()->json([
                'status' => 200,
                'message' => $results[0]->message,
            ]);
        } else if ($results[0]->result == 0) {
            return response()->json([
                'status' => 400,
                'message' => $results[0]->message
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => $results[0]->message
            ]);
        }
    }

    public function EditFilm($maPhim)
    {
        $dienviens = DienVien::where('deleted', '<>', '2')->get();
        $nhasxs = NhaSanXuat::where('deleted', '<>', '2')->get();
        $daodiens = DaoDien::where('deleted', '<>', '2')->get();
        $danhmucs = DanhMucPhim::where('deleted', '<>', '2')->get();
        $phim = Phim::find($maPhim);
//        $dienVienOfFilm = ChiTietDienVien::where('maPhim', $maPhim)->pluck('maDienVien')->toArray();
//        $nhaSxOfFilm = ChiTietNSX::where('maPhim', $maPhim)->pluck('maNhaSanXuat')->toArray();
//        $daoDienOfFilm = ChiTietDaoDien::where('maPhim', $maPhim)->pluck('maDaoDien')->toArray();
        $imageOfFilm = HinhAnhPhim::where('maPhim', $maPhim)->pluck('linkHinhAnh')->toArray();
        return view('components.admin.phim.edit-phim', compact(
            'dienviens',
            'nhasxs',
            'daodiens',
            'danhmucs',
            'phim',
            'imageOfFilm'
        ));
    }

    public function UpdatePhim(AddFilmRequest $request, $maPhim)
    {
        try {
            $phim = Phim::find($maPhim);
            $phim->tenPhim = $request->input('tenPhim');
            $phim->ngayKhoiChieu = $request->input('ngayKhoiChieu');
            $phim->moTaPhim = $request->input('moTa');
            $phim->linkTrailer = $request->input('Trailer');
            $phim->maDanhMuc = $request->input('danhMuc');
            $phim->giaVe = $request->input('giaVe');
            $phim->maDienVien = json_encode(explode(',', $request->input('dienVien')));
            $phim->maDaoDien = json_encode(explode(',', $request->input('daoDien')));
            $phim->maNhaSanXuat = json_encode(explode(',', $request->input('nhaSanXuat')));
            $phim->slug = (new Slugify())->slugify($request->input('tenPhim'));
            $phim->save();

            $hinhAnh = HinhAnhPhim::where('maPhim', $maPhim)->first();
            if($hinhAnh){
                if ($request->hasFile('hinhAnh')) {

                    if (isset($hinhAnh)){
                        if (file_exists($hinhAnh->linkHinhAnh)) {
                            unlink($hinhAnh->linkHinhAnh);
                        }
                    }

                    $file = $request->file('hinhAnh');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                    $file->move('uploads/phim/', $filename);

                    $hinhAnh->linkHinhAnh = 'uploads/phim/' . $filename;
                    $hinhAnh->save();
                }
            } else {
                if ($request->hasFile('hinhAnh')) {
                    $hinhAnh = new HinhAnhPhim();
                    $file = $request->file('hinhAnh');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                    $file->move('uploads/phim/', $filename);

                    $hinhAnh->maHinhAnh = '';
                    $hinhAnh->linkHinhAnh = 'uploads/phim/' . $filename;
                    $hinhAnh->maPhim = $maPhim;
                    $hinhAnh->save();
                }
            }


//            if($phim->wasRecentlyCreated){
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật phim thành công'
            ]);
//            } else {
//                return response()->json([
//                    'status' => 500,
//                    'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
//                ]);
//            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }
}
