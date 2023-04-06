<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AddNewAdmin()
    {
        return view('components.admin.admin-rap.them-moi-admin');
    }

    public function ListAdmin()
    {
        return view('components.admin.admin-rap.danh-sach-admin');
    }
}
