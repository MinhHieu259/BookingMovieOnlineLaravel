<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietRap;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function AddPhong()
    {
        return view('components.admin.phong.them-moi-phong');
    }

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
}
