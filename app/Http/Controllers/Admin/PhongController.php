<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Phong\AddPhongRequest;
use App\Models\ChiTietRap;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function ListPhong()
    {
        return view('components.admin.phong.danh-sach-phong');
    }

    public function ListPhongOfCum($maCum)
    {
        return view('components.admin.phong.danh-sach-phong-cum');
    }

    public function ListPhongOfCumTable($maCum)
    {
        $phongs = Phong::getListPhongOfCum($maCum);
        return response()->json([
            'status' => 200,
            'data' => $phongs
        ]);
    }

    public function InsertPhong(AddPhongRequest $request, $maCum)
    {
        $results = Phong::InsertPhong($request, $maCum);
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

    public function EditPhong($maCum, $maPhong)
    {
        $phong = Phong::EditPhong($maCum, $maPhong);
        return response()->json([
            'status' => 200,
            'data' => $phong
        ]);
    }

    public function UpdatePhong()
    {

    }
}
