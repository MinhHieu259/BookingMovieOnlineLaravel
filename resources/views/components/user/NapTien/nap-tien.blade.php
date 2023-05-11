@extends('layouts.user-layout')
@section('title', 'Nạp tiền')
@section('content')
    <div class="bg-white border-top border-bottom mt-3 pt-4">
        <div id="lich-chieu-background">
            <div class="container pt-4 pb-4">
                <div class="text-center">
                    <h1 class="mb-0 text-white">CineBooker</h1>
                    <p class="text-muted mb-0">
                        Mua vé nhanh chóng chỉ với 1 click
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">

                <h2 class="mb-4 text-center">
                    Lựa chọn gói nạp
                </h2>

                <div class="alert alert-light">
                    Xin chào <strong>{{$user->username}}</strong>.
                    · Số dư CineBooker Credits: <strong>{{number_format($user->soDu)}} đ</strong>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-6 mb-4">
                        <a href="/nap-tien/goi-100k">
                            <img src="{{asset('assets/images/user/naptien/100k.png')}}" class="img-fluid mb-2">
                        </a>
                        <a href="/nap-tien/goi-100k" class="btn btn-dark btn-block">
                            Nạp gói này
                        </a>
                    </div>
                    <div class="col-sm-3 col-6 mb-4">
                        <a href="/nap-tien/goi-200k">
                            <img src="{{asset('assets/images/user/naptien/200k.png')}}" class="img-fluid mb-2">
                        </a>
                        <a href="/nap-tien/goi-200k" class="btn btn-dark btn-block">
                            Nạp gói này
                        </a>
                    </div>
                    <div class="col-sm-3 col-6 mb-4">
                        <a href="/nap-tien/goi-500k">
                            <img src="{{asset('assets/images/user/naptien/500k.png')}}" class="img-fluid mb-2">
                        </a>
                        <a href="/nap-tien/goi-500k" class="btn btn-dark btn-block">
                            Nạp gói này
                        </a>
                    </div>
                    <div class="col-sm-3 col-6 mb-4">
                        <a href="/nap-tien/goi-1tr">
                            <img src="{{asset('assets/images/user/naptien/1tr.png')}}" class="img-fluid mb-2">
                        </a>
                        <a href="/nap-tien/goi-1tr" class="btn btn-dark btn-block">
                            Nạp gói này
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
