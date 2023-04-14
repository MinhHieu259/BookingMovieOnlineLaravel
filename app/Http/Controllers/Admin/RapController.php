<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rap\SaveRapRequest;
use App\Models\RAP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RapController extends Controller
{
    public function AddRap()
    {
        $rap = RAP::getInforRap();
        return view('components.admin.rap.them-moi-rap', compact('rap'));
    }

    public function ValidateDataRap(SaveRapRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Các trường bạn nhập chưa đúng yêu cầu',
                'errors' => $validator->errors(),
            ]);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Hiển thị popup'
            ]);
        }
    }

    public function SaveDataRap(Request $request)
    {
        $rap = RAP::first();
        if ($rap){
            $rap->tenRap = $request->input('tenRap');
            if($request->hasFile('anhDaiDien')){
                if (file_exists($rap->anhDaiDien)) {
                    unlink($rap->anhDaiDien);
                }

                $file = $request->file('anhDaiDien');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName().time().'.'.$extension;
                $file->move('uploads/rap/', $filename);

                $rap->anhDaiDien = 'uploads/rap/'.$filename;
            } else {
//                if (file_exists($rap->anhDaiDien)) {
//                    unlink($rap->anhDaiDien);
//                }
//
//                $rap->anhDaiDien = '';
            }
            $rap->save();
//            if($rap->wasChanged()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Cập nhật thông tin rạp thành công'
                ]);
//            }
        } else {
            $rap = new RAP();
            $rap->maRap = '';
            $rap->tenRap = $request->input('tenRap');
            if($request->hasFile('anhDaiDien')){
                $file = $request->file('anhDaiDien');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName().time().'.'.$extension;
                $file->move('uploads/rap/', $filename);

                $rap->anhDaiDien = 'uploads/rap/'.$filename;
            } else {
                $rap->anhDaiDien = '';
            }
            $rap->save();
            if($rap->wasRecentlyCreated){
                return response()->json([
                    'status' => 200,
                    'message' => 'Thêm mới thông tin rạp thành công'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
                ]);
            }
        }
    }
}
