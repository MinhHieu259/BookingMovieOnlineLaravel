<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Auth\RegisterRequest;
use App\Models\NguoiDung;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

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
            if ($validator->fails()) {
                return redirect('/dang-nhap')
                    ->withErrors($validator)
                    ->withInput();
            }
            $dataLogin = [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ];

            if (Auth::guard('nguoidung')->attempt($dataLogin)) {
                return redirect('/')->with('message', 'Đăng nhập thành công');
            } else {
                return redirect('/dang-nhap')->with('messageError', 'Tài khoản mật khẩu không chính xác')
                    ->withInput();
            }

        } catch (Exception $e) {
            return redirect('/dang-nhap')
                ->with('messageError', 'Lỗi rồi bạn thử lại nha')
                ->withInput();
        }
    }

    public function DoLoginModal(Request $request)
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
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'messages' => $validator->errors()
                ]);
            }
            $dataLogin = [
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ];

            if (Auth::guard('nguoidung')->attempt($dataLogin)) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Đăng nhập thành công',
                    'user' => Auth::guard('nguoidung')->user()
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Tài khoản mật khẩu không chính xác'
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi rồi bạn thử lại nha'
            ]);
        }
    }

    public function DoLogout(Request $request)
    {
        Auth::guard('nguoidung')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'Đăng xuất thành công');
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
        $this->_registerOrLoginUSer($user);
        return redirect()->route('trang-chu');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUSer($user);
        return redirect()->route('trang-chu');
    }

    public function _registerOrLoginUSer($data)
    {
        $user = NguoiDung::where('email', '=', $data->email)->first();
        if(!$user)
        {
            $user = new NguoiDung();
            $user->maNguoiDung = '';
            $user->hoVaTen = $data->name;
            $user->email = $data->email;
            $user->username = $data->email;
            $user->password = Hash::make('12345678');
            //$user->provider_id = $data->id;
            $user->anhDaiDien = $data->avatar;
            $user->save();
        }
        $newUser = NguoiDung::where('email', $data->email)->first();
        Auth::guard('nguoidung')->login($newUser);
    }
}
