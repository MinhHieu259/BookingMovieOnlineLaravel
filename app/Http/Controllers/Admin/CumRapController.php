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
        $tinhs = Tinh::getAllTinh();
        return view('components.admin.cum-rap.them-moi-cum-rap', compact('tinhs'));
    }

    public function EditCumRap($maRap)
    {
        $tinhs = Tinh::getAllTinh();
        $cumrap = ChiTietRap::getDetailChiTietRap($maRap);
        return view('components.admin.cum-rap.cap-nhat-cum-rap', compact('tinhs', 'cumrap'));
    }

    public function ListCumRap()
    {
        $cumraps = ChiTietRap::getListCumRap();
        return view('components.admin.cum-rap.danh-sach-cum-rap', compact('cumraps'));
    }

    public function ListCumRapToTable()
    {
        $cumraps = ChiTietRap::getListCumRap();
        return response()->json([
            'status' => 200,
            'data' => $cumraps
        ]);;
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
//        $cumrap = new ChiTietRap();
//        $rap = RAP::first();
//        $cumrap->maChiTietRap = '';
//        $cumrap->tenRap = $request->input('tenRap');
//        $cumrap->diaChi = $request->input('diaChi');
//        $cumrap->map = $request->input('map');
//        $cumrap->moTa = $request->input('motaRap');
//        $cumrap->maTinh = $request->input('tinh');
//        $cumrap->maRap = $rap->maRap;
//        $cumrap->save();
//        if ($cumrap->wasRecentlyCreated) {
//            return response()->json([
//                'status' => 200,
//                'message' => 'Thêm mới cụm rạp thành công'
//            ]);
//        } else {
//            return response()->json([
//                'status' => 500,
//                'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
//            ]);
//        }
        $results = ChiTietRap::InsertCumRap($request);
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

    public function UpdateDataCumRap(SaveCumRap $request, $maRap)
    {
//        $cumrap = ChiTietRap::find($maRap);
//        $cumrap->tenRap = $request->input('tenRap');
//        $cumrap->diaChi = $request->input('diaChi');
//        $cumrap->map = $request->input('map');
//        $cumrap->moTa = $request->input('motaRap');
//        $cumrap->maTinh = $request->input('tinh');
//        $cumrap->save();
//
//        return response()->json([
//            'status' => 200,
//            'message' => 'Cập nhật cụm rạp thành công'
//        ]);

        $results = ChiTietRap::UpdateCumRap($request, $maRap);
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

    public function DeleteCumRap($maCum)
    {
//        $cumRap = ChiTietRap::find($maCum);
//        if ($cumRap) {
//            $cumRap->deleted = 2;
//            $cumRap->save();
//            return response()->json([
//                'status' => 200,
//                'message' => 'Xóa cụm rạp thành công'
//            ]);
//        } else {
//            return response()->json([
//                'status' => 400,
//                'message' => 'Cụm rạp không tồn tại trong hệ thống'
//            ]);
//        }
        $results = ChiTietRap::DeleteCumRap($maCum);
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
}
