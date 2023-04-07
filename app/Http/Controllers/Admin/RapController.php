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
        return view('components.admin.rap.them-moi-rap');
    }

    public function ListRap()
    {
        $raps = RAP::whereNotIn('maRap', ['RAP0001'])->get();
        return view('components.admin.rap.danh-sach-rap', compact('raps'));
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
                'message' => 'Thêm mới rạp thành công'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Bị lỗi bạn vui lòng kiểm tra lại'
            ]);
        }
    }
}
