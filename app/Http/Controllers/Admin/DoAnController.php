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
        $doans = DoAn::getListFood();
        return view('components.admin.do-an.danh-sach-do-an', compact('doans'));
    }

    public function ListFoodToTable()
    {
        $doans = DoAn::getListFood();
        return response()->json([
            'status' => 200,
            'data' => $doans
        ]);
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

    public function EditFood($maDoAn)
    {
        $cumraps = ChiTietRap::all();
        $doAn = DoAn::getDetailFood($maDoAn);
        return view('components.admin.do-an.cap-nhat-do-an', compact('cumraps', 'doAn'));
    }

    public function UpdateDoAn(AddDoAnRequest $request, $maDoAn)
    {
        $results = DoAn::UpdateDoAn($request, $maDoAn);
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

    public function DeleteDoAn($maDoAn)
    {
        $results = DoAn::DeleteDoAn($maDoAn);
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
