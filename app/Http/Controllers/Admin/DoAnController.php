<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoAnController extends Controller
{
    public function AddFood()
    {
        return view('components.admin.do-an.them-moi-do-an');
    }

    public function ListFood()
    {
        return view('components.admin.do-an.danh-sach-do-an');
    }
}
