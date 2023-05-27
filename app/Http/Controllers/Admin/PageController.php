<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostModel;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('components.admin.trang-chu');
    }
}
