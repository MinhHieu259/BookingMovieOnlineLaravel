@extends('layouts.admin-layout')
@section('title', 'Thêm mới dãy ghế')
@push('js')
{{--    <script src="{{asset('admin/function/do-an/add-edit-do-an.js')}}"></script>--}}
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới thông tin dãy ghế</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới dãy ghế</li>
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
                            <h3 class="card-title">Nhập thông tin dãy ghế</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenDayGhe">Tên dãy ghế <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="tenDayGhe" placeholder="Nhập tên dãy ghế" autocomplete="off">
                                            <span class="text-danger input-error" id="tenDayGheError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="soLuongGhe">Số lượng ghế <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="soLuongGhe" placeholder="Nhập số lượng ghế" autocomplete="off">
                                            <span class="text-danger input-error" id="soLuongGheError"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveDayGhe">Lưu thông tin</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
