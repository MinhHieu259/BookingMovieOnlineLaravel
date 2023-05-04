@extends('layouts.user-layout-no-footer')
@section('title', 'Chọn ghế')
@push('js')
    {{--    <script src="{{asset('assets/js/function/lich-chieu/chi-tiet-lich-chieu.js')}}"></script>--}}
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
    <div class="ticketing-steps bg-white border-bottom">
        <div class="container">
            <div class="row">
                <div class="col ticketing-step">
                    <div class="text-danger" style="color: grey">
                        <i class="fa-solid fa-chair"></i>
                        <span>Chọn ghế</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-bowl-food"></i>
                        <span>Bắp nước</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-money-bill"></i>
                        <span>Thanh toán</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step">
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
                                        Lật Mặt 6: Tấm Vé Định Mệnh
                                    </p>
                                    <p class="text-truncate mb-0">
                                        <strong>Starlight Đà Nẵng</strong>
                                    </p>
                                    <p class="text-truncate mb-0">
                                        Suất
                                        <strong>23:55</strong> -
                                        Hôm nay,
                                        <strong>
                                            04/05
                                        </strong>
                                    </p>
                                    <p class="text-truncate mb-0">
                                        Phòng chiếu <strong>04</strong>
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
                                    <span class="h2 mb-0 countdown-timer" style="font-size: 15px">02:08</span>
                                </div>
                            </div> <!-- / .row -->

                        </div>
                    </div>
                    <div class="flow-actions sticky-button-bars">

                        <button type="submit"
                                class="btn btn-lg btn-dark btn-ticketing-do-submit btn-block btn-ticketing-flow mt-3"
                                disabled="">Tiếp tục
                        </button>

                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="container-fluid" id="content-phong-ghe">
                        <ul class="showcase">
                            <li>
                                <div class="seat"></div>
                                <small>Ghế trống</small>
                            </li>
                            <li>
                                <div class="seat selected"></div>
                                <small>Đang chọn</small>
                            </li>
                            <li>
                                <div class="seat occupied"></div>
                                <small>Đã bán</small>
                            </li>
                            <li>
                                <div class="seat double"></div>
                                <small>Ghế đôi</small>
                            </li>
                        </ul>
                        <div class="container">
                            <div class="screen">
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10" id="areaChair">
                                    <div class="row"><span class="rowName">A</span>
                                        <div class="seat  " data-name="A1"></div>
                                        <div class="seat  " data-name="A2"></div>
                                        <div class="seat  " data-name="A3"></div>
                                        <div class="seat  " data-name="A4"></div>
                                        <div class="seat  " data-name="A5"></div>
                                        <div class="seat  " data-name="A6"></div>
                                        <div class="seat  " data-name="A7"></div>
                                        <div class="seat  " data-name="A8"></div>
                                        <div class="seat  " data-name="A9"></div>
                                        <div class="seat  " data-name="A10"></div>
                                    </div>
                                    <div class="row"><span class="rowName">B</span>
                                        <div class="seat  " data-name="B1"></div>
                                        <div class="seat  " data-name="B2"></div>
                                        <div class="seat  " data-name="B3"></div>
                                        <div class="seat  " data-name="B4"></div>
                                        <div class="seat  " data-name="B5"></div>
                                        <div class="seat  " data-name="B6"></div>
                                        <div class="seat  " data-name="B7"></div>
                                        <div class="seat  " data-name="B8"></div>
                                        <div class="seat  " data-name="B9"></div>
                                        <div class="seat  " data-name="B10"></div>
                                    </div>
                                    <div class="row"><span class="rowName">C</span>
                                        <div class="seat  " data-name="C1"></div>
                                        <div class="seat  " data-name="C2"></div>
                                        <div class="seat  " data-name="C3"></div>
                                        <div class="seat  " data-name="C4"></div>
                                        <div class="seat  " data-name="C5"></div>
                                        <div class="seat  " data-name="C6"></div>
                                        <div class="seat  " data-name="C7"></div>
                                        <div class="seat  " data-name="C8"></div>
                                        <div class="seat  " data-name="C9"></div>
                                        <div class="seat  " data-name="C10"></div>
                                    </div>
                                    <div class="row"><span class="rowName">D</span>
                                        <div class="seat  " data-name="D1"></div>
                                        <div class="seat  " data-name="D2"></div>
                                        <div class="seat  " data-name="D3"></div>
                                        <div class="seat  " data-name="D4"></div>
                                        <div class="seat  " data-name="D5"></div>
                                        <div class="seat  " data-name="D6"></div>
                                        <div class="seat  " data-name="D7"></div>
                                        <div class="seat  " data-name="D8"></div>
                                        <div class="seat  " data-name="D9"></div>
                                        <div class="seat  " data-name="D10"></div>
                                    </div>
                                    <div class="row"><span class="rowName">E</span>
                                        <div class="seat  double" data-name="E1"></div>
                                        <div class="seat  double" data-name="E2"></div>
                                        <div class="seat  double" data-name="E3"></div>
                                        <div class="seat  double" data-name="E4"></div>
                                        <div class="seat  double" data-name="E5"></div>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
