@extends('layouts.user-layout-no-footer')
@section('title', 'Thông tin vé đã đặt')
@push('js')
{{--    <script src="{{asset('assets/js/function/lich-chieu/chon-ghe.js')}}"></script>--}}
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
                <div class="col ticketing-step" id="seatIcon">
                    <div class="" style="color: grey">
                        <i class="fa-solid fa-chair"></i>
                        <span>Chọn ghế</span>
                    </div>
                </div>
                <div style="display: flex; align-items: center;color: grey">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
                <div class="col ticketing-step" id="foodIcon">
                    <div style="color: grey">
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
                    <div class="active-red" style="color: grey">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Thông tin vé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('popup')

@endpush
