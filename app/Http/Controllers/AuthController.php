<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Auth\RegisterRequest;
use App\Models\NguoiDung;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function DoRegister(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'email'
                ],
                'username' => [
                    'required'
                ],
                'password' => [
                    'required',
                    'min:8'
                ],
                'confirmPassword' => [
                    'required',
                    'same:password'
                ]
            ], [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Định dạng email chưa đúng',
                'username.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Nhập tối thiểu 8 ký tự',
                'confirmPassword.required' => 'Bạn chưa xác nhận mật khẩu',
                'confirmPassword.same' => 'Mật khẩu nhập lại không khớp'
            ]);

            if ($validator->fails()) {
                return redirect('/dang-ky-tai-khoan')
                    ->withErrors($validator)
                    ->withInput();
            }
            if (NguoiDung::where('username', $request->input('username'))->first()) {
                return redirect('/dang-ky-tai-khoan')->with('messageError', 'Tài khoản đã tồn tại trong hệ thống')
                    ->withInput();
            } else if (NguoiDung::where('email', $request->input('email'))->first()) {
                return redirect('/dang-ky-tai-khoan')->with('messageError', 'Email đã tồn tại trong hệ thống')
                    ->withInput();
            }
            $nguoiDung = NguoiDung::create([
                'maNguoiDung' => '',
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect('/dang-nhap')->with('message', 'Đăng ký tài khoản thành công')->withInput();
        } catch (Exception $e) {
            return redirect('/dang-ky-tai-khoan')->with('messageError', 'Lỗi rồi, bạn kiểm tra lại');
        }
    }

    public function DoLogin(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => [
                    'required'
                ],
                'password' => [
                    'required',
                    'min:8'
                ]
            ], [
                'username.required' => 'Tên đăng nhập không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Nhập tối thiểu 8 ký tự'
            ]);
        } catch (Exception $e){

        }
    }
}
