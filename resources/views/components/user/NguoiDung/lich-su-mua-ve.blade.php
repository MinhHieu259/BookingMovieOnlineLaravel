@extends('layouts.user-layout')
@section('title', 'Lịch sử mua vé')
@push('js')
    <script src="{{asset('assets/js/function/tai-khoan/lich-su-mua-ve.js')}}"></script>
    <!-- Thêm đường dẫn tới JavaScript của SweetAlert -->
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/lich-su-mua-ve.css')}}">
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
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
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
                                <a href="{{route('HistoryOrderView')}}" class="nav-link active">
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
       <div class="tab-header mt-4">
           <div class="tab-no-use tab-title active" data-status="yes">
               <span>Đã dùng</span>
           </div>
           <div style="margin-left: 15px;">|</div>
           <div class="tab-use tab-title" style="margin-left: 15px" data-status="no">
               <span>Chưa dùng</span>
           </div>
       </div>
        <input type="hidden" id="rapInfor" value="{{$rap}}">
        <div class="tab-status-content mt-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <span class="row">
                        <span class="col-md-2">
                            <img width="50" src="{{asset('uploads/user/mascot.png1683642688.png')}}" alt="Hello">
                        </span>
                        <span class="col-md-10">
                            <h4>Tên phim</h4>
                            <h5>Giờ chiếu</h5>
                            <h7 style="color: grey">Tình trạng</h7>
                        </span>
                    </span>
                </a>
            </div>
        </div>
    </div>

@endsection
