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

            if($request->hasFile('user_avatar')){
                if (file_exists($nguoiDung->anhDaiDien)) {
                    unlink($nguoiDung->anhDaiDien);
                }

                $file = $request->file('user_avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName().time().'.'.$extension;
                $file->move('uploads/user/', $filename);

                $nguoiDung->anhDaiDien = 'uploads/user/'.$filename;
            }
            $nguoiDung->save();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật thông tin thành công',
                'user' => $nguoiDung
            ]);
        } catch (\Exception $exception){
            return response()->json([
                'status' => 200,
                'message' => 'Lỗi hệ thống'
            ]);
        }
    }
}
