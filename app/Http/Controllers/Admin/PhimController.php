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
        $phim = new Phim();
        $phim->maPhim = '';
        $phim->tenPhim = $request->input('tenPhim');
        $phim->ngayKhoiChieu = $request->input('ngayKhoiChieu');
        $phim->moTaPhim = $request->input('moTa');
        $phim->linkTrailer = $request->input('Trailer');
        $phim->maDanhMuc = $request->input('danhMuc');
        $phim->giaVe = $request->input('giaVe');
        $phim->save();
        //Get maPhim sau khi insert
        $newPhim = Phim::orderBy('maPhim', 'DESC')->get();
        $maPhim = $newPhim[0]->maPhim;

        //Insert data dienvien
        $arrayDienVien = explode(",", $request->input('dienVien'));
        if (count($arrayDienVien) > 0){
            foreach ($arrayDienVien as $index => $dienvien){
                $dienVien = new ChiTietDienVien();
                $dienVien->maChiTiet = '';
                $dienVien->maPhim = $maPhim;
                $dienVien->maDienVien = $dienvien;
                $dienVien->save();
            }
        }

        $arrayNSX = explode(",", $request->input('nhaSanXuat'));
        if (count($arrayNSX) > 0){
            foreach ($arrayNSX as $index => $nsx){
                $nhaSX = new ChiTietNSX();
                $nhaSX->maChiTiet = '';
                $nhaSX->maPhim = $maPhim;
                $nhaSX->maNhaSanXuat = $nsx;
                $nhaSX->save();
            }
        }

        $arrayDaoDien = explode(",", $request->input('daoDien'));
        if (count($arrayDaoDien) > 0){
            foreach ($arrayDaoDien as $index => $daodien){
                $daoDien = new ChiTietDaoDien();
                $daoDien->maChiTiet = '';
                $daoDien->maPhim = $maPhim;
                $daoDien->maDaoDien = $daodien;
                $daoDien->save();
            }
        }

        if (count($request->file('hinhAnh')) > 0){
            foreach ($request->file('hinhAnh') as $index => $hinhanh){
                $hinhAnh = new HinhAnhPhim();
                $file = $hinhanh;
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName().time().'.'.$extension;
                $file->move('uploads/phim/', $filename);

                $hinhAnh->maHinhAnh = '';
                $hinhAnh->maPhim = $maPhim;
                $hinhAnh->linkHinhAnh = 'uploads/phim/'.$filename;
                $hinhAnh->save();
            }
        }
    }
}
