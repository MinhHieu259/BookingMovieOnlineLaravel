@extends('layouts.user-layout-no-footer')
@section('title', 'Chọn ghế')
@push('js')
    <script src="{{asset('assets/js/function/lich-chieu/chon-ghe.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/ghe.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="display: none">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="seat-tab" data-toggle="tab" data-target="#seat" type="button" role="tab" aria-controls="seat" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="food-tab" data-toggle="tab" data-target="#food" type="button" role="tab" aria-controls="food" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pay-tab" data-toggle="tab" data-target="#pay" type="button" role="tab" aria-controls="pay" aria-selected="false">Contact</button>
        </li>
    </ul>

    <div class="ticketing-steps bg-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col ticketing-step" id="seatIcon">
                    <div class="active-red" style="color: grey">
                        <i class="fa-solid fa-chair"></i>
                        <span>Chọn ghế</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step" id="foodIcon">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>Bắp nước</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step" id="payIcon">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-money-bill"></i>
                        <span>Thanh toán</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step" id="ticketIcon">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Thông tin vé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header mb-3"></div>
        <form method="post" id="seatPickerForm">
            <div class="row">
                <div class="col-lg-4 col-12 order-sm-last">

                    <div class="card card-sm" style="width: 100%">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="text-truncate mb-0">
                                        {{$suatChieuInfor->tenPhim}}
                                    </p>
                                    <p class="text-truncate mb-0">
                                        <strong> {{$suatChieuInfor->tenRap}}</strong>
                                    </p>
                                    <p class="text-truncate mb-0">
                                        Suất
                                        <strong> {{$suatChieuInfor->gioChieu}}</strong>
                                        <strong>
                                            {{$suatChieuInfor->ngayChieu}}
                                        </strong>
                                    </p>
                                    <p class="text-truncate mb-0">
                                        Phòng chiếu <strong> {{$suatChieuInfor->tenPhong}}</strong>
                                        - Ghế
                                        <span class="font-weight-bold ticketing-seats">...</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card sticky-header-bars mt-3" style="width: 100%">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2" style="font-size: 12px">
                                        Tổng đơn hàng
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0 ticketing-total-amount" style="font-size: 15px">
                                        0 đ
                                    </span>

                                </div>
                                <div class="col text-right border-left ticketing-countdown-timer">
                                    <!-- Title -->
                                    <h6 class="card-title text-uppercase text-muted mb-2" style="font-size: 12px">
                                        Thời gian giữ ghế
                                    </h6>

                                    <!-- Heading -->
                                    <span class="h2 mb-0 countdown-timer" style="font-size: 15px"></span>
                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>
                    <div class="flow-actions sticky-button-bars">

                        <button type="button"
                                id="btnContinue"
                                class="btn btn-lg btn-dark btn-ticketing-do-submit btn-block btn-ticketing-flow mt-3"
                                >Tiếp tục
                        </button>

                    </div>
                </div>
                <div class="col-lg-8 col-12" id="area-change">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="seat" role="tabpanel" aria-labelledby="seat-tab">
                            <div class="card" style="width: 100%">
                                <div class="card-body">
                                    <div class="container-fluid" id="content-phong-ghe">
                                        <ul class="showcase">
                                            <li>
                                                <div class="seat"></div>
                                                <small class="text-white">Ghế trống</small>
                                            </li>
                                            <li>
                                                <div class="seat selected"></div>
                                                <small class="text-white">Đang chọn</small>
                                            </li>
                                            <li>
                                                <div class="seat occupied"></div>
                                                <small class="text-white">Đã bán</small>
                                            </li>
                                            <li>
                                                <div class="seat double"></div>
                                                <small class="text-white">Ghế đôi</small>
                                            </li>
                                        </ul>
                                        <div class="container">
                                            <div class="screen">
                                            </div>
                                            <div class="row">
                                                <div class="col-1"></div>
                                                <div class="col-10" id="areaChair">

                                                </div>
                                                <div class="col-1"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="food" role="tabpanel" aria-labelledby="food-tab">
                            <div class="ticketing-content">
                                <div class="card" style="width: 100%">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap card-table">
                                            <thead>
                                            <tr>
                                                <th>Combo</th>
                                                <th class="text-right d-none d-sm-block">Giá tiền</th>
                                                <th class="text-right">Số lượng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="bg-light text-muted" colspan="3">Combo</td>
                                            </tr>
                                            <tr class="ticketing-concession-type" data-code="483" data-price="107000">
                                                <td class="concession-name">
                                                    BIG SHARE Combo
                                                    <span class="d-block text-muted">2 Ly nước lớn, 1 Bắp lớn</span>
                                                    <span class="d-block d-sm-none text-muted">
                                                        107,000 đ
                                                    </span>
                                                </td>
                                                <td class="concession-price text-right">
                                                    107,000 đ
                                                </td>
                                                <td class="ticketing-select text-right">
                                                    <a href="#" class="btn btn-sm btn-rounded-circle btn-white btn-concession-quantity" data-type="minus">
                                                        -
                                                    </a>
                                                    <input name="type_483" type="text" min="0" max="10" class="form-control form-control-flush text-center d-inline" value="0" style="width: 30px;" readonly="">
                                                    <a href="#" class="btn btn-sm btn-rounded-circle btn-white btn-concession-quantity" data-type="plus">
                                                        +
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr class="ticketing-concession-type" data-code="482" data-price="97000">
                                                <td class="concession-name">
                                                    SHARE Combo
                                                    <span class="d-block text-muted">2 Ly nước vừa, 1 Bắp lớn</span>
                                                    <span class="d-block d-sm-none text-muted">
                                                        97,000 đ
                                                    </span>
                                                </td>
                                                <td class="concession-price text-right">
                                                    97,000 đ
                                                </td>
                                                <td class="ticketing-select text-right">
                                                    <a href="#" class="btn btn-sm btn-rounded-circle btn-white btn-concession-quantity" data-type="minus">
                                                        -
                                                    </a>
                                                    <input name="type_482" type="text" min="0" max="10" class="form-control form-control-flush text-center d-inline" value="0" style="width: 30px;" readonly="">
                                                    <a href="#" class="btn btn-sm btn-rounded-circle btn-white btn-concession-quantity" data-type="plus">
                                                        +
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay-tab">
                            <div class="ticketing-content ticketing-checkout-page">

                                <div class="card" style="width: 100%">
                                    <div class="card-header bg-light">
                                        <div class="card-header-title text-muted">
                                            Tóm tắt đơn hàng
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table card-table">
                                            <thead>
                                            <tr>
                                                <th>Mô tả</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="text-right">Thành tiền</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>GHẾ TIÊU CHUẨN</td>
                                                <td class="text-center">1</td>
                                                <td class="text-right">80,000 đ</td>
                                            </tr>
                                            <tr>
                                                <td>Phí tiện ích</td>
                                                <td class="text-center"></td>
                                                <td class="text-right">4,000 đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Tổng</td>
                                                <td class="text-right">84,000 đ</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card mt-5" style="width: 100%">
                                    <div class="card-header bg-light">
                                        <div class="card-header-title text-muted">
                                            Hình thức thanh toán
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="payment_gateway" value="momo">
                                        <input type="hidden" name="payment_method" value="">

                                        <div class="payment-gateway pg-momo clearfix active" data-pg="momo" data-pm="">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/momo-icon.png">
                                                Ví MoMo
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-moveek pm-bank-transfer clearfix disabled" data-pg="moveek" data-pm="bank-transfer">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/moveek-icon.png">
                                                Chuyển khoản / Internet Banking
                                                <span class="pm-description">Khả dụng từ 09:00 đến 24:00</span>
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-shopeepay clearfix" data-pg="shopeepay" data-pm="">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/shopeepay-icon.png">
                                                Ví ShopeePay
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-payoo pm-international-card clearfix" data-pg="payoo" data-pm="cc-payment">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/payoo-icon.png">
                                                Thẻ Visa, Master, JCB
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-payoo pm-internal-card clearfix" data-pg="payoo" data-pm="bank-payment">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/payoo-icon.png">
                                                Thẻ ATM (Thẻ nội địa)
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-payoo pm-store clearfix" data-pg="payoo" data-pm="pay-at-store">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/payoo-icon.png">
                                                Tại cửa hàng tiện lợi
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-foxpay clearfix" data-pg="foxpay" data-pm="">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/foxpay-icon.png">
                                                Ví Foxpay
                                            </div>
                                        </div>
                                        <div class="payment-gateway pg-moveek pm-moveek-credits clearfix moveek-credits-guide" data-pg="moveek" data-pm="moveek-credits">
                                            <i class="fe fe-check-circle pg-checked"></i>
                                            <div class="pg-info">
                                                <img width="28px" src="https://cdn.moveek.com/bundles/ornweb/img/moveek-icon.png">
                                                Moveek Credits
                                                <span class="pm-description">
                                                        Số dư Moveek Credits: <strong class="text-dark">0 đ</strong>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-5" style="width: 100%">
                                    <div class="card-header bg-light">
                                        <div class="card-header-title text-muted">
                                            Thông tin cá nhân
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group"><label for="orn_ticketing_order_customer_fullname">Họ và tên</label><input type="text" id="orn_ticketing_order_customer_fullname" name="orn_ticketing_order_customer[fullname]" class="form-control"></div>
                                        <div class="form-group"><label for="orn_ticketing_order_customer_email" class="required">Email</label><input type="email" id="orn_ticketing_order_customer_email" name="orn_ticketing_order_customer[email]" required="required" class="form-control"></div>
                                        <div class="form-group"><label for="orn_ticketing_order_customer_phone" class="required">Số điện thoại</label><input type="tel" id="orn_ticketing_order_customer_phone" name="orn_ticketing_order_customer[phone]" required="required" class="form-control"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('popup')
    @include('layouts.includes.user.popup.popup-message-timeout')
@endpush
