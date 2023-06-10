<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $films = DB::table('PHIM')
        ->join('HinhAnhPhim as HA', 'PHIM.maPhim', '=', 'HA.maPhim')
        ->select('PHIM.*', 'HA.linkHinhAnh')
        ->get();
        $post = PostModel::leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
        ->where('deleted', '1')
        ->orderBy('maBaiViet', 'DESC')
        ->get();
        $sliders = Phim::where('slider', '<>', null)->get();
        return view('components.user.trang-chu', compact('films', 'post', 'sliders'));
    }

    public function AccessDenied()
    {
        return view('errors.access-denied');
    }
}
