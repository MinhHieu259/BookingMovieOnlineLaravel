<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapController extends Controller
{
    public function ChiTietRap()
    {
        return view('components.user.Rap.chi-tiet-rap');
    }
}
