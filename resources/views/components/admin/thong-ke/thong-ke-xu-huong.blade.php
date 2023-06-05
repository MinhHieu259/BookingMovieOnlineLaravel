@extends('layouts.admin-layout')
@section('title', 'Thống kê xu hướng')
@push('js')
    <script src="{{asset('admin/function/chart/thong-ke-xu-huong.js')}}"></script>
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
                        <li class="breadcrumb-item active">Thống kê xu hướng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <h2 class="text-center">Thống kê xu hướng xem phim</h2>
            <div class="row">
                <div class="col-md-2 mt-3">
                    <div class="form-group">
                        <label>Chọn phim</label>
                        <select class="select2" id="Phim" data-placeholder="Chọn phim" style="width: 100%;">
                            @foreach($films as $index => $film)
                                <option value="{{$film->maPhim}}">{{$film->tenPhim}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger input-error" id="PhimError"></span>
                    </div>
                </div>

                <div class="col-md-2 mt-3">
                    <label for="denThang">Tiêu chí</label>
                    <select class="form-control" id="tieuChi">
                        <option value="1">Độ tuổi</option>
                        <option value="2">Giới tính</option>
                    </select>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <canvas id="chartXuHuong" style="width: 100px"></canvas>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

