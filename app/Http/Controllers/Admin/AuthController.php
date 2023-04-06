<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function LoginPage()
    {
        return view('components.admin.auth.dang-nhap');
    }

    public function DoLogin(LoginRequest $request)
    {

            $credentials = $request->only(['username', 'password']);
            if (Auth::guard('admins')->attempt($credentials)) {
                return redirect()->route('admin.trangchu');
            } else {
                return redirect()->route('admin.dangnhap')->with('message', 'Tài khoản hoặc mật khẩu không chính xác');
            }
    }

    public function LogoutAdmin(Request $request)
    {
        Auth::guard('admins')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

//        return redirect('/admin/dang-nhap')->with('message', 'Đăng xuất thành công');
        return response()->json(['redirect' => '/admin/dang-nhap']);
    }
}
