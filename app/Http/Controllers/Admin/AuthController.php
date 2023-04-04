<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function LoginPage()
    {
        return view('components.admin.auth.dang-nhap');
    }
}
