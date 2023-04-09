<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CumRap\SaveCumRap;
use App\Models\ChiTietRap;
use App\Models\RAP;
use App\Models\Tinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CumRapController extends Controller
{
    public function AddNewCumRap()
    {
        $tinhs = Tinh::all();
        return view('components.admin.cum-rap.them-moi-cum-rap', compact('tinhs'));
    }

    public function EditCumRap($maRap)
    {
        $tinhs = Tinh::all();
        $cumrap = ChiTietRap::find($maRap);
        return view('components.admin.cum-rap.cap-nhat-cum-rap', compact('tinhs', 'cumrap'));
    }

    public function ListCumRap()
    {
        $cumraps = ChiTietRap::all();
        return view('components.admin.cum-rap.danh-sach-cum-rap', compact('cumraps'));
    }

    public function ValidationCumRap(SaveCumRap $request)
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

    public function SaveDataCumRap(SaveCumRap $request)
    {
        $cumrap = new ChiTietRap();
        $rap = RAP::first();
        $cumrap->maChiTietRap = '';
        $cumrap->tenRap = $request->input('tenRap');
        $cumrap->diaChi = $request->input('diaChi');
        $cumrap->map = $request->input('map');
        $cumrap->moTa = $request->input('motaRap');
        $cumrap->maTinh = $request->input('tinh');
        $cumrap->maRap = $rap->maRap;
        $cumrap->save();
        if($cumrap->wasRecentlyCreated){
            return response()->json([
                'status' => 200,
                'message' => 'Thêm mới cụm rạp thành công'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
            ]);
        }
    }

    public function UpdateDataCumRap(SaveCumRap $request, $maRap)
    {
        $cumrap = ChiTietRap::find($maRap);
        $cumrap->tenRap = $request->input('tenRap');
        $cumrap->diaChi = $request->input('diaChi');
        $cumrap->map = $request->input('map');
        $cumrap->moTa = $request->input('motaRap');
        $cumrap->maTinh = $request->input('tinh');
        $cumrap->save();
//        if($cumrap->wasRecentlyCreated){
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật cụm rạp thành công'
            ]);
//        } else {
//            return response()->json([
//                'status' => 500,
//                'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
//            ]);
//        }
    }
}
