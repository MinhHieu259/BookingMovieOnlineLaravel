@extends('layouts.admin-layout')
@section('title', 'Chi tiết ghế trong suất chiếu')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/css/chi-tiet-ghe.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('popup')
    {{--    @include('layouts.includes.admin.popup.phim.popup-delete-phim')--}}
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Danh sách ghế</h1> --}}
                    {{--                    <input id="maPhim" type="hidden" value="{{$phim->maPhim}}">--}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách ghế</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <h3 class="mb-3 text-center">Chi tiết suất chiếu</h3>  
        <div class="row">
            <div class="col-md-9">
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
                            <div class="col-2"></div>
                            <div class="col-8" id="areaChair"></div>
                            <div class="col-2"></div>
                        </div>
        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-sm" style="width: 100%; height: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-truncate mb-0">
                                    {{$suatChieuInfor->tenPhim}}
                                </p>
                                <p class="text-truncate mb-0">
                                    <strong>Rạp: {{$suatChieuInfor->tenRap}}</strong>
                                </p>
                                <p class="text-truncate mb-0">
                                    Suất
                                    <strong> {{$suatChieuInfor->gioChieu}}</strong>
                                    <strong>
                                        {{$suatChieuInfor->ngayChieu}}
                                    </strong>
                                </p>
                                <p class="text-truncate mb-0">
                                    Phòng chiếu: <strong> {{$suatChieuInfor->tenPhong}}</strong>
                                </p>
                                <p class="text-truncate mb-0">
                                    Số ghế trống: <strong>{{$countSeatFree}} / {{$countSeat}}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('js')
    <script src="{{asset('admin/function/suat-chieu/chi-tiet-ghe.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

@endpush
