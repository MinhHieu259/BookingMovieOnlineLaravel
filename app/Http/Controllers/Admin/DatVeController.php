<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatVeController extends Controller
{
    public function ManagerTicketView()
    {
        return view('components.admin.dat-ve.danh-sach');
    }
}
