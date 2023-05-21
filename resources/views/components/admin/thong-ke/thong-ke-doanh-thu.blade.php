@extends('layouts.admin-layout')
@section('title', 'Thống kê doanh thu')
@push('js')
    <script src="{{asset('admin/function/chart/thong-ke-doanh-thu.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('#reservationdate').datetimepicker({
            format: 'MM/YYYY'
        });
        $('#reservationDenThang').datetimepicker({
            format: 'MM/YYYY'
        });
    </script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thống kê doanh thu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <h2 class="text-center">Thống kê doanh thu</h2>
            <div class="row">
                <div class="col-md-2 mt-3">
                    <label for="tuThang">Từ tháng</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" id="tuThang" class="form-control datetimepicker-input"
                               data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 mt-3">
                    <label for="denThang">Đến tháng</label>
                    <div class="input-group date" id="reservationDenThang" data-target-input="nearest">
                        <input type="text" id="denThang" class="form-control datetimepicker-input"
                               data-target="#reservationDenThang">
                        <div class="input-group-append" data-target="#reservationDenThang" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <canvas id="chartDoanhThu"></canvas>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

