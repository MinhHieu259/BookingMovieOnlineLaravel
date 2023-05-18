@extends('layouts.user-layout')
@section('title', 'Cập nhật tài khoản')
@push('js')
    <script src="{{asset('assets/js/function/tai-khoan/cap-nhat-tai-khoan.js')}}"></script>
    <!-- Thêm đường dẫn tới JavaScript của SweetAlert -->
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
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
                            <span class="badge badge-soft-success">{{number_format(Auth::guard('nguoidung')->user()->soDu)}} đ</span>
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
                                    <div class="form-group"><label for="username" class="required">Tên tài
                                            khoản</label><input type="text" id="username" name="username"
                                                                disabled="disabled" required="required"
                                                                class="form-control"
                                                                value="{{Auth::guard('nguoidung')->user()->username}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="email" class="required">Email</label><input
                                            type="email" id="email" name="email" disabled="disabled"
                                            required="required" class="form-control"
                                            value="{{Auth::guard('nguoidung')->user()->email}}"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="hoVaTen">Họ và tên</label><input
                                            type="text" id="hoVaTen" name="hoVaTen"
                                            value="{{Auth::guard('nguoidung')->user()->hoVaTen}}" class="form-control">
                                        <span class="text-danger input-error" id="hoVaTenError"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="soDienThoai">Số điện thoại</label><input
                                            type="tel" id="soDienThoai" name="soDienThoai"
                                            value="{{Auth::guard('nguoidung')->user()->soDienThoai}}"
                                            placeholder="Số điện thoại" class="form-control">
                                        <span class="text-danger input-error" id="soDienThoaiError"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="user_avatar">Ảnh đại diện</label>
                                        <div class="custom-file"><input type="file" id="user_avatar" name="user_avatar"
                                                                        lang="vi"
                                                                        accept="image/gif, image/jpeg, image/png"
                                                                        class="custom-file-input"><label for="user_avatar"
                                                                                                         class="custom-file-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <button type="button" id="user_save" class="btn btn-dark">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
