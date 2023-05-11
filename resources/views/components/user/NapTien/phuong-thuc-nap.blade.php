@extends('layouts.user-layout')
@section('title', 'Nạp tiền gói - '.number_format($soTienView))
@push('js')
    <script src="{{asset('assets/js/function/nap-tien/nap-tien.js')}}"></script>
@endpush
@push('popup')
    @include('layouts.includes.user.popup.popup-no-choose-nap')
@endpush
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
                    <h2 class="mb-4 text-center" data-tiennap="{{$soTienView}}" id="soTienNap">
                        Nạp {{number_format($soTienView)}} đ
                    </h2>

                    <div class="alert alert-light">
                        Xin chào <strong>{{$user->username}}</strong>.
                        · Số dư CineBooker Credits: <strong>{{number_format($user->soDu)}} đ</strong>
                    </div>

                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <div class="card-header-title">
                                Hình thức thanh toán
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="payment-gateway pg-momo clearfix" data-pg="momo" data-pm="">
                                <div class="row">
                                    <input type="radio" name="typeNapTien" value="momo" id="momo">
                                    <label class="pg-info ml-2" for="momo">
                                        <img width="28px" src="{{asset('assets/images/user/momo.png')}}">
                                        Ví MoMo
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="payment-gateway pg-moveek pm-bank-transfer clearfix" data-pg="moveek" data-pm="bank-transfer">
                                <div class="row">
                                    <input type="radio" name="typeNapTien" value="banking" id="credit">
                                    <label class="pg-info ml-2" for="credit">
                                        <img width="28px" src="{{asset('assets/images/user/mascot.png')}}">
                                        Chuyển khoản ngân hàng (Khả dụng từ 9:00 - 23:00)
                                        <br>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 mb-4" style="width: 100%">
                        <div class="card-header">
                            <div class="card-header-title">
                                Thông tin cá nhân
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group"><label for="deposit_fullname" class="required">Họ và tên</label><input value="{{$user->hoVaTen}}" type="text" id="deposit_fullname" name="deposit_fullname" required="required" class="form-control"></div>
                            <div class="form-group"><label for="deposit_email" class="required">Email</label><input type="email" value="{{$user->email}}" id="deposit_email" name="deposit_email" required="required" class="form-control"></div>
                            <div class="form-group"><label for="deposit_phone" class="required">Số điện thoại</label><input type="tel" id="deposit_phone" value="{{$user->soDienThoai}}" name="deposit_phone" required="required" class="form-control"></div>

                        </div>
                    </div>

                    <div class="card d-lg-none">
                        <div class="card-body">
                            Vé đã mua không thể đổi hoặc hoàn tiền.<br>Mã vé sẽ được gửi <strong>01</strong> lần qua số điện thoại và email đã nhập. Vui lòng kiểm tra lại thông tin trước khi tiếp tục.
                        </div>
                    </div>

                    <button type="button" id="btnNapNgay" class="btn btn-dark btn-block mb-4" >Nạp ngay</button>
                </div>
            </div>
    </div>
@endsection
