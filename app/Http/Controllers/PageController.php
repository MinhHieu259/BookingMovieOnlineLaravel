<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('components.user.trang-chu');
    }

    public function AccessDenied()
    {
        return view('errors.access-denied');
    }
}
