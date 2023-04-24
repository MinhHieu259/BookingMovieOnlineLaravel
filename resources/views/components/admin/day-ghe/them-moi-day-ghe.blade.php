@extends('layouts.admin-layout')
@section('title', 'Thêm mới dãy ghế')
@push('js')
    <script src="{{asset('admin/function/day-ghe/add-edit-day-ghe.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dayghe.css')}}">
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
                    <form id="form-add-day-ghe">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nhập thông tin dãy ghế</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="row">
                                   <div class="col-md-6">
                                       <button id="btnAddGhe" style="margin-right: 10px; margin-bottom: 10px;width: 7%" class="btn btn-success btn-sm float-left">+</button>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table-bordered" style="width: 100%" id="table-input-day-ghe">
                                            <thead>
                                            <tr>
                                                <th style="width: 20%" class="pl-2">STT</th>
                                                <th style="width: 30%" class="pl-2">Tên dãy ghế</th>
                                                <th style="width: 30%" class="pl-2">Số ghế mỗi dãy</th>
                                                <th style="width: 20%" class="pl-2">Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dayghes as $index => $dayghe)
                                            <tr>
                                                <input type="hidden" value="{{$dayghe->maDayGhe}}" name="maDayGhe[]">
                                                <td class="td-table-input text-right"><span class="mr-3">{{$index + 1}}</span></td>
                                                <td class="td-table-input"><input class="form-control input-in-table" name="tenDayGhe[]" type="text" value="{{$dayghe->tenDayGhe}}"></td>
                                                <td class="td-table-input"><input class="form-control input-in-table" style="text-align: right !important;" name="soGheMoiDay[]" type="text" value="{{$dayghe->soGheMoiDay}}"></td>
                                                <td style="padding: 0px; text-align: center;"><button style="margin-top: 3%" data-ma-day-ghe="{{$dayghe->maDayGhe}}" class="btn btn-danger btn-sm btn-delete-dayghe">X</button></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnSaveDayGhe">Lưu thông tin</button>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
