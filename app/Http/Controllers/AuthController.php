<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function RegisterPage()
    {
        return view('components.user.Auth.dang-ky-tai-khoan');
    }

    public function LoginPage()
    {
        return view('components.user.Auth.dang-nhap');
    }

    public function DoRegister()
    {

    }
}
