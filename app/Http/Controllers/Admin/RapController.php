<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RapController extends Controller
{
    public function AddRap()
    {
        return view('components.admin.rap.them-moi-rap');
    }

    public function ListRap()
    {
        return view('components.admin.rap.danh-sach-rap');
    }
}
