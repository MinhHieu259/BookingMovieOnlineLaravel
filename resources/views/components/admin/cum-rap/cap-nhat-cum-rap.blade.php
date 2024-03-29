@extends('layouts.admin-layout')
@section('title', 'Cập nhật cụm rạp')
@push('js')
    <script src="{{asset('admin/function/add-edit-cum-rap.js')}}"></script>
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
                    <h1 class="m-0">Cập nhật cụm rạp</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật cụm</li>
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
                            <h3 class="card-title">Chỉnh sửa thông tin cụm rạp</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameRap">Tên rạp <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="tenRap" value="{{$cumrap->tenRap}}" placeholder="Nhập tên rạp" autocomplete="off">
                                            <span class="text-danger input-error" id="tenRapError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameRap">Địa chỉ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="diaChi" value="{{$cumrap->diaChi}}" placeholder="Nhập địa chỉ rạp" autocomplete="off">
                                            <span class="text-danger input-error" id="diaChiError"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="map">Thông tin bản đồ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$cumrap->map}}" id="map" placeholder="Nhập địa chỉ bản đồ" autocomplete="off">
                                    <span class="text-danger input-error" id="mapError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="motaRap">Mô tả cụm rạp</label>
                                    <textarea id="motaRap" class="form-control" rows="3" placeholder="Nhập mô tả cụm rạp">{{$cumrap->moTa}}</textarea>
                                    <span class="text-danger input-error" id="motaRapError"></span>
                                </div>
                                <div class="form-group" data-select2-id="42">
                                    <label>Tỉnh thành</label>
                                    <select id="tinh" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($tinhs as $index => $tinh)
                                        <option value="{{$tinh->maTinh}}" {{$tinh->maTinh == $cumrap->maTinh ? 'selected' : ''}}>{{$tinh->tenTinh}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger input-error" id="tinhError"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" data-ma-cum="{{ $cumrap->maChiTietRap }}" class="btn btn-primary" id="btnUpdateCumRap">Lưu thông tin</button>
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
