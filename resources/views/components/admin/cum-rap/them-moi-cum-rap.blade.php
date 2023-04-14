@extends('layouts.admin-layout')
@section('title', 'Thêm mới cụm rạp')
@push('js')
    <script src="{{asset('admin/function/add-edit-cum-rap.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới cụm rạp</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới cụm</li>
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
                            <h3 class="card-title">Nhập thông tin cụm rạp</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameRap">Tên rạp</label>
                                            <input type="text" class="form-control" id="tenRap" placeholder="Nhập tên rạp" autocomplete="off">
                                            <span class="text-danger input-error" id="tenRapError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nameRap">Địa chỉ</label>
                                            <input type="text" class="form-control" id="diaChi" placeholder="Nhập địa chỉ rạp" autocomplete="off">
                                            <span class="text-danger input-error" id="diaChiError"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="map">Thông tin bản đồ</label>
                                    <input type="text" class="form-control" id="map" placeholder="Nhập địa chỉ bản đồ" autocomplete="off">
                                    <span class="text-danger input-error" id="mapError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="motaRap">Mô tả cụm rạp</label>
                                    <textarea id="motaRap" class="form-control" rows="3" placeholder="Nhập mô tả cụm rạp"></textarea>
                                    <span class="text-danger input-error" id="motaRapError"></span>
                                </div>
                                <div class="form-group" data-select2-id="42">
                                    <label>Tỉnh thành</label>
                                    <select id="tinh" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($tinhs as $index => $tinh)
                                        <option value="{{$tinh->maTinh}}">{{$tinh->tenTinh}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger input-error" id="tinhError"></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveCumRap">Lưu thông tin</button>
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
