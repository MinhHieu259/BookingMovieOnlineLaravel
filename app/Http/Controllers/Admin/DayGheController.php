<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DayGheController extends Controller
{
    public function ListDayGhe()
    {
        return view('components.admin.day-ghe.them-moi-day-ghe');
    }
}
