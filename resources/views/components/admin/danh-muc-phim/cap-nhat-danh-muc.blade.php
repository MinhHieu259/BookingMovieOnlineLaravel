@extends('layouts.admin-layout')
@section('title', 'Cập nhật danh mục phim')
@push('js')
    <script src="{{asset('admin/function/danh-muc/add-edit-danh-muc.js')}}"></script>
@endpush
@push('css')

@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật danh mục phim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật danh mục</li>
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
                            <h3 class="card-title">Nhập thông tin danh mục</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenDanhMucEdit">Tên danh mục</label>
                                            <input type="text" class="form-control" value="{{$danhMuc->tenDanhMuc}}" id="tenDanhMucEdit" placeholder="Nhập tên danh mục" autocomplete="off">
                                            <span class="text-danger input-error" id="tenDanhMucEditError"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" data-ma-danh-muc="{{$danhMuc->maDanhMuc}}" class="btn btn-primary" id="btnUpdateDanhMuc">Lưu thông tin</button>
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
