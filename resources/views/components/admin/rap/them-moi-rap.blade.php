@extends('layouts.admin-layout')
@section('title', 'Thêm mới rạp')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới rạp</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới rạp</li>
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
                            <h3 class="card-title">Nhập thông tin rạp</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameRap">Tên rạp</label>
                                    <input type="text" class="form-control" id="tenRap" placeholder="Nhập tên rạp" autocomplete="off">
                                    <span class="text-danger input-error" id="tenRapError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="avatarRap">Ảnh đại diện rạp</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatarRap">
                                            <label class="custom-file-label" for="avatarRap">Chọn hình ảnh</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Tải lên</span>
                                        </div>
                                    </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div id="avatarPreview"></div>
                                       </div>
                                       <div class="col-md-6">
                                           <button type="button" style="display:none;" class="float-right mt-5 btn btn-danger" id="delete-image-preview">Xóa</button>
                                       </div>
                                   </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveRap">Lưu thông tin</button>
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

@push('js')
    <script src="{{asset('admin/function/auth.js')}}"></script>
    <script src="{{asset('admin/function/rap.js')}}"></script>
@endpush
