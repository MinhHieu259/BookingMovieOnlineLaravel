<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BaiViet\AddPostRequest;
use App\Http\Requests\Admin\BaiViet\UpdateostRequest;
use App\Http\Requests\Admin\BaiViet\UpdatePostRequest;
use App\Models\Phim;
use App\Models\PostModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BaiVietController extends Controller
{
    public function index()
    {
        return view('components.admin.bai-viet.list');
    }

    public function getListPost()
    {
        $posts = PostModel::leftJoin('Admin', 'Admin.maAdmin', '=', 'BaiViet.maNguoiDang')
            ->where('deleted', '1')->get();
        return response()->json([
            'status' => 200,
            'posts' => $posts,
        ]);
    }

    public function add()
    {
        $films = Phim::all();
        return view('components.admin.bai-viet.add', compact('films'));
    }

    public function edit($maBaiViet)
    {
        $films = Phim::all();
        $post = PostModel::where('maBaiViet', $maBaiViet)
            ->first();
        return view('components.admin.bai-viet.edit', compact('films', 'post'));
    }

    public function ValidatePost(AddPostRequest $request)
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
                'message' => 'Hiển thị popup',
            ]);
        }
    }

    public function ValidatePostUpdate(UpdatePostRequest $request)
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
                'message' => 'Hiển thị popup',
            ]);
        }
    }

    public function SaveData(AddPostRequest $request)
    {
        $post = new PostModel();
        DB::beginTransaction();

        try {
            $post->maBaiViet = '';
            $post->tieuDe = $request->input('tieuDe');
            $post->moTa = $request->input('moTa');
            if ($request->hasFile('avatarBaiViet')) {
                $file = $request->file('avatarBaiViet');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                $file->move('uploads/bai-viet/', $filename);

                $post->hinhAnh = 'uploads/bai-viet/' . $filename;
            }
            // $post->avatarBaiViet = $request->input('avatarBaiViet');
            $post->noiDung = $request->input('noiDungBaiViet');
            $post->maPhim = $request->input('maPhim');
            $post->thoiGianDang = Carbon::now()->isoFormat('DD/MM/YYYY HH:mm:ss');
            $post->maNguoiDang = Auth::guard('admins')->user()->maAdmin;
            $post->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm mới bài viết thành công',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi rồi nè',
                'messageEx' => $e->getMessage(),
            ]);
        }

    }

    public function deletePost($maBaiViet)
    {
        $post = PostModel::where('maBaiViet', $maBaiViet)
            ->first();
        DB::beginTransaction();
        try {
            $post->deleted = '2';
            $post->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Xóa bài viết thành công',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi rồi nè',
                'messageEx' => $e->getMessage(),
            ]);
        }

    }

    public function UpdateData(UpdatePostRequest $request, $maBaiViet)
    {
        $post = PostModel::where('maBaiViet', $maBaiViet)->first();
        DB::beginTransaction();

        try {
            $post->tieuDe = $request->input('tieuDe');
            $post->moTa = $request->input('moTa');
            if ($request->hasFile('avatarBaiViet')) {
                if (file_exists($post->hinhAnh)) {
                    unlink($post->hinhAnh);
                }
                $file = $request->file('avatarBaiViet');
                $extension = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName() . time() . '.' . $extension;
                $file->move('uploads/bai-viet/', $filename);

                $post->hinhAnh = 'uploads/bai-viet/' . $filename;
            }
            $post->noiDung = $request->input('noiDungBaiViet');
            $post->thoiGianDang = Carbon::now()->isoFormat('DD/MM/YYYY HH:mm:ss');
            $post->maNguoiDang = Auth::guard('admins')->user()->maAdmin;
            $post->save();
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật bài viết thành công',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 500,
                'message' => 'Lỗi rồi nè',
                'messageEx' => $e->getMessage(),
            ]);
        }

    }
}
