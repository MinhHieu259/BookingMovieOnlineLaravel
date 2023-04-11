<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoAn\AddDoAnRequest;
use App\Models\ChiTietRap;
use App\Models\DoAn;
use App\Models\Tinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoAnController extends Controller
{
    public function AddFood()
    {
        $cumraps = ChiTietRap::all();
        return view('components.admin.do-an.them-moi-do-an', compact('cumraps'));
    }

    public function ListFood()
    {
        return view('components.admin.do-an.danh-sach-do-an');
    }

    public function ValidateDoAn(AddDoAnRequest $request)
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

    public function SaveData(AddDoAnRequest $request)
    {
//        $doan = new DoAn();
//        $doan->maDoAn = '';
//        $doan->tenDoAn = $request->input('tenDoAn');
//        $doan->gia = $request->input('gia');
//        $doan->maChiTietRap = $request->input('maChiTietRap');
//        $doan->save();
//        if ($doan->wasRecentlyCreated) {
//            return response()->json([
//                'status' => 200,
//                'message' => 'Thêm mới đồ ăn thành công'
//            ]);
//        } else {
//            return response()->json([
//                'status' => 500,
//                'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
//            ]);
//        }
        $results = DoAn::SaveDoAn($request);
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
