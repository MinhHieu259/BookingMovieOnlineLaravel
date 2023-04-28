<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UpdateUserView()
    {
        return view('components.user.NguoiDung.thong-tin-tai-khoan');
    }

    public function UpdateUser(UpdateUserRequest $request)
    {
        dd($request->all());
    }
}
