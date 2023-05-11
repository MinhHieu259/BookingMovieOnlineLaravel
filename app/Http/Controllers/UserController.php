<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UpdateUserView()
    {
        return view('components.user.NguoiDung.thong-tin-tai-khoan');
    }

    public function UpdateUser(UpdateUserRequest $request)
    {
        try {
            $nguoiDung = NguoiDung::find(Auth::guard('nguoidung')->user()->maNguoiDung);
            $nguoiDung->hoVaTen = $request->input('hoVaTen');
            $nguoiDung->soDienThoai = $request->input('soDienThoai');

            if ($request->hasFile('user_avatar')) {
                if (file_exists($nguoiDung->anhDaiDien)) {
                    unlink($nguoiDung->anhDaiDien);
                }

                $file = $request->file('user_avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                $file->move('uploads/user/', $filename);

                $nguoiDung->anhDaiDien = 'uploads/user/' . $filename;
            }
            $nguoiDung->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thông tin thành công',
                'user' => $nguoiDung
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 200,
                'message' => 'Lỗi hệ thống'
            ]);
        }
    }

    public function NapTienView()
    {
        $user = Auth::guard('nguoidung')->user();
        return view('components.user.NapTien.nap-tien', compact('user'));
    }

    public function PhuongThucNap($soTien)
    {
        $soTienView = '';
        $user = Auth::guard('nguoidung')->user();
        switch ($soTien){
            case 'goi-100k':
                $soTienView = '100000';
                break;
            case 'goi-200k':
                $soTienView = '200000';
                break;
            case 'goi-500k':
                $soTienView = '500000';
                break;
            case 'goi-1tr':
                $soTienView = '1000000';
                break;
        }
        return view('components.user.NapTien.phuong-thuc-nap', compact('soTienView', 'user'));
    }
}
