<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DanhMuc\AddDanhMucRequest;
use App\Models\DanhMucPhim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    public function AddDanhMuc()
    {
        return view('components.admin.danh-muc-phim.them-moi-danh-muc');
    }

    public function ListDanhMuc()
    {
        return view('components.admin.danh-muc-phim.danh-sach-danh-muc');
    }

    public function ListDanhMucToTable()
    {
        $danhmucs = DanhMucPhim::getListDanhMuc();
        return response()->json([
            'status' => 200,
            'data' => $danhmucs
        ]);
    }

    public function ValidateDanhMuc(AddDanhMucRequest $request)
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

    public function InsertDanhMuc(AddDanhMucRequest $request)
    {
        $results = DanhMucPhim::InsertDanhMuc($request);
        if ($results[0]->result == 1) {
            return response()->json([
                'status' => 200,
                'message' => $results[0]->message,
                'maDanhMuc' => $results[0]->maDanhMuc
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

    public function EditDanhMuc($maDanhMuc)
    {
        $danhMuc = DanhMucPhim::getDetailDanhMuc($maDanhMuc);
        return view('components.admin.danh-muc-phim.cap-nhat-danh-muc', compact('danhMuc'));
    }

    public function UpdateDanhMuc(AddDanhMucRequest $request, $maDanhMuc)
    {
        $results = DanhMucPhim::UpdateDanhMuc($request, $maDanhMuc);
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

    public function DeleteDanhMuc($maDanhMuc)
    {
        $results = DanhMucPhim::DeleteDanhMuc($maDanhMuc);
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
