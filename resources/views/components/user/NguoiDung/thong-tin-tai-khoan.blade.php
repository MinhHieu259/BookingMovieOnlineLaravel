@extends('layouts.user-layout')
@section('title', 'Cập nhật tài khoản')
@push('js')
    <script src="{{asset('assets/js/function/tai-khoan/cap-nhat-tai-khoan.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/tai-khoan.css')}}">
@endpush
@section('content')
    <!-- HEADER -->
    <div class="header">
        <img src="{{asset('assets/images/user/tix-banner.png')}}" class="header-img-top" alt="banner">
        <div class="container">
            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto avatar-user">
                        <div class="avatar avatar-xxl header-avatar-top">
                            <img width="200" src=" {{Auth::guard('nguoidung')->user()->getAvatar()}}" alt="ImageAvatar"
                                 class="avatar-img rounded-circle border border-4 border-body">
                        </div>
                    </div>
                    <div class="col username-balance">
                        <h1 class="header-title">
                            {{Auth::guard('nguoidung')->user()->username}}
                            <span class="badge badge-soft-success">{{Auth::guard('nguoidung')->user()->soDu}} đ</span>
                        </h1>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown"
                                   aria-expanded="false">
                                    Tài khoản
                                </a>
                                <div class="dropdown-menu" style="">
                                    <a href="/user/profile" class="dropdown-item">Quản lý tài khoản</a>
                                    <a href="/profile/change-password" class="dropdown-item">Đổi mật khẩu</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="/user/diary" class="nav-link">
                                    Tủ phim
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/user/orders" class="nav-link">
                                    Vé
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Nạp tiền
                                </a>
                                <div class="dropdown-menu">
                                    <a href="/nap-tien/" class="dropdown-item">Nạp tiền</a>
                                    <a href="/user/deposits" class="dropdown-item">Lịch sử nạp tiền</a>
                                    <a href="/user/credits" class="dropdown-item">Lịch sử giao dịch</a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 mt-3">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <form name="user" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_username" class="required">Tên tài
                                            khoản</label><input type="text" id="user_username" name="user[username]"
                                                                disabled="disabled" required="required"
                                                                class="form-control"
                                                                value="{{Auth::guard('nguoidung')->user()->username}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_email" class="required">Email</label><input
                                            type="email" id="user_email" name="user[email]" disabled="disabled"
                                            required="required" class="form-control"
                                            value="{{Auth::guard('nguoidung')->user()->email}}"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_fullname">Họ và tên</label><input
                                            type="text" id="user_fullname" name="user[fullname]"
                                            value="{{Auth::guard('nguoidung')->user()->hoVaTen}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_phone">Số điện thoại</label><input
                                            type="tel" id="user_phone" name="user[phone]"
                                            value="{{Auth::guard('nguoidung')->user()->soDienThoai}}"
                                            placeholder="Số điện thoại" class="form-control"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_file">Ảnh đại diện</label>
                                        <div class="custom-file"><input type="file" id="user_file" name="user[file]"
                                                                        lang="vi"
                                                                        accept="image/gif, image/jpeg, image/png"
                                                                        class="custom-file-input"><label for="user_file"
                                                                                                         class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" id="user_save" class="btn btn-dark">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
