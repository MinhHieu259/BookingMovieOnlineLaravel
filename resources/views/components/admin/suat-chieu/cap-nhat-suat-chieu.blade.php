@extends('layouts.admin-layout')
@section('title', 'Cập nhật lịch chiếu phim')
@push('js')
    <script src="{{asset('admin/function/suat-chieu/update-suat-chieu.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
    <script>
        $('#ngayChieuPhim').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $('#timepicker').datetimepicker({
            format: 'HH:mm',
            pickDate: false,
            pickSeconds: false,
            pick12HourFormat: false
        })
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
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật lịch chiếu (Phim {{$phim->tenPhim}})</h1>
                    <input id="maPhim" type="hidden" value="{{$phim->maPhim}}">
                    <input id="maPhong" type="hidden" value="{{$suatChieu->maPhong}}">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật lịch chiếu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nhập thông lịch chiếu</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ngayChieu">Ngày chiếu <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="ngayChieuPhim"
                                                 data-target-input="nearest">
                                                <input value="{{$suatChieu->ngayChieu}}" type="text" id="ngayChieu"
                                                       class="form-control datetimepicker-input"
                                                       data-target="#ngayChieuPhim">
                                                <div class="input-group-append" data-target="#ngayChieuPhim"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <span class="text-danger input-error" id="ngayChieuError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giờ chiếu: <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                <input value="{{$suatChieu->gioChieu}}" type="text" class="form-control datetimepicker-input"
                                                       data-target="#timepicker" id="gioChieu"/>
                                                <div class="input-group-append" data-target="#timepicker"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                            <span class="text-danger input-error" id="gioChieuError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chọn cụm rạp <span class="text-danger">*</span></label>
                                            <select disabled id="cumRap" class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true"
                                                    data-select2-id="cumRap">
                                                <option value="">---Chọn cụm rạp ---</option>
                                                @foreach($cumRaps as $index => $cumRap)
                                                    <option {{$cumRap->maChiTietRap == $suatChieu->maChiTietRap ? 'selected' : ''}} value="{{$cumRap->maChiTietRap}}">{{$cumRap->tenRap}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger input-error" id="cumRapError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chọn Phòng <span class="text-danger">*</span></label>
                                            <select disabled id="phongChieu"
                                                    class="form-control select2 select2-hidden-accessible"
                                                    style="width: 100%;" tabindex="-1" aria-hidden="true"
                                                    data-select2-id="phongChieu">

                                            </select>
                                            <span class="text-danger input-error" id="phongChieuError"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveSuatChieu">Lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
