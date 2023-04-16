<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function AddFilm()
    {
        return view('components.admin.phim.add-phim');
    }

    public function ListFilm()
    {
        return view('components.admin.phim.danh-sach-phim');
    }
}
