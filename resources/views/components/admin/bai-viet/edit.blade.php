@extends('layouts.admin-layout')
@section('title', 'Cập nhật bài viết')
@push('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('admin/css/phim.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@push('popup')
    {{-- @include('layouts.includes.admin.popup.do-an.popup-delete-do-an') --}}
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cập nhật bài viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật bài viết</li>
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
                            <h3 class="card-title">Nhập thông tin bài viết</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tieuDe">Tiêu đề <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="tieuDe"
                                                placeholder="Nhập tiêu đề bài viết" autocomplete="off"
                                                value="{{$post->tieuDe}}">
                                            <span class="text-danger input-error" id="tieuDeError"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="moTa">Mô tả <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="moTa" placeholder="Nhập mô tả bài viết" autocomplete="off">
                                              {{$post->moTa}}
                                            </textarea>
                                            <span class="text-danger input-error" id="moTaError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="avatarBaiViet">Ảnh đại diện</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="avatarBaiViet">
                                                    <label class="custom-file-label" for="avatarBaiViet">Chọn hình
                                                        ảnh</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Tải lên</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                           <div class="col-md-6">
                                               <div id="avatarPreview">
                                                   @if (isset($post->hinhAnh))
                                                       <img style="margin-top: 20px; width: 500px;" src="{{asset($post->hinhAnh)}}" alt="">
                                                   @endif
                                               </div>
                                           </div>
                                           <div class="col-md-6">
                                               <button type="button" class="float-right mt-5 btn btn-danger" id="delete-image-preview">Xóa</button>
                                           </div>
                                       </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="noiDungBaiViet">Nội dung bài viết <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" id="noiDungBaiViet" placeholder="Nhập nội dung bào viết" autocomplete="off">
                                                {{ $post->noiDung }}
                                            </textarea>
                                            <span class="text-danger input-error" id="noiDungBaiVietError"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveBaiViet">Lưu thông tin</button>
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
<script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
<script src="{{ asset('admin/function/bai-viet/edit.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script>
    $('.select2').select2()
</script>
@endpush
