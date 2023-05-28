<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DaoDien;
use App\Models\DienVien;
use App\Models\Phim;
use App\Models\PostModel;

class BaiVietController extends Controller
{
    public function DetailPost($slug)
    {
        $post = PostModel::where('slug', $slug)
            ->leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
            ->first();
        $postRelate = PostModel::where('maPhim', $post->maPhim)
            ->leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
            ->where('deleted', '1')
            ->get();
        $film = Phim::where('maPhim', $post->maPhim)->first();
        return view('components.user.BaiViet.detail', compact('post', 'postRelate', 'film'));
    }

    public function TinTucByFilm($slug)
    {
        $film = Phim::join('HinhAnhPhim as HA', 'HA.maPhim', '=', 'PHIM.maPhim')
            ->join('DanhMucPhim as DM', 'DM.maDanhMuc', '=', 'PHIM.maDanhMuc')
            ->where('slug', $slug)
            ->first();
        $actors = DienVien::whereIn('maDienVien', json_decode($film->maDienVien))->get();
        $directors = DaoDien::whereIn('maDaoDien', json_decode($film->maDaoDien))->get();
        $postRelate = PostModel::where('maPhim', $film->maPhim)
            ->leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
            ->where('deleted', '1')
            ->get();
        return view('components.user.BaiViet.list-of-film', compact('film', 'actors', 'directors', 'postRelate'));
    }
}
