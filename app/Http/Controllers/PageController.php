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
        $post = PostModel::where('deleted', '1')->get();
        return view('components.user.trang-chu', compact('films', 'post'));
    }

    public function AccessDenied()
    {
        return view('errors.access-denied');
    }
}
