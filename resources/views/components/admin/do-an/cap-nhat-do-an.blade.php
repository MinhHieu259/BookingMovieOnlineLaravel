@extends('layouts.admin-layout')
@section('title', 'Cập nhật đồ ăn cụm rạp')
@push('js')
    <script src="{{asset('admin/function/do-an/add-edit-do-an.js')}}"></script>
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
                    <h1 class="m-0">Cập nhật đồ ăn</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật đồ ăn</li>
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
                            <h3 class="card-title">Nhập thông tin đồ ăn</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenDoAn">Tên đồ ăn <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$doAn->tenDoAn}}" id="tenDoAn" placeholder="Nhập tên đồ ăn" autocomplete="off">
                                            <span class="text-danger input-error" id="tenDoAnError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gia">Giá tiền <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$doAn->gia}}" id="gia" placeholder="Nhập giá tiền" autocomplete="off">
                                            <span class="text-danger input-error" id="giaError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Cụm rạp <span class="text-danger">*</span></label>
                                            <select id="maChiTietRap" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                @foreach($cumraps as $index => $cumrap)
                                                    <option value="{{$cumrap->maChiTietRap}}" {{$cumrap->maChiTietRap == $doAn->maChiTietRap ? 'selected' : ''}}>{{$cumrap->tenRap}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger input-error" id="maChiTietRapError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" data-ma-do-an="{{ $doAn->maDoAn }}" class="btn btn-primary" id="btnUpdateDoAn">Lưu thông tin</button>
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
