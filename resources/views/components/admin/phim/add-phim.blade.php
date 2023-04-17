@extends('layouts.admin-layout')
@section('title', 'Thêm mới phim')
@push('js')
    <script src="{{asset('admin/function/phim/add-edit-phim.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
    <script>
        $('#reservationdate').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('admin/css/phim.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm mới phim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới phim</li>
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
                            <h3 class="card-title">Nhập thông tin phim</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tenPhim">Tên phim <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="tenPhim"
                                                   placeholder="Nhập tên phim" autocomplete="off">
                                            <span class="text-danger input-error" id="tenPhimError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Trailer">Trailer <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Trailer"
                                                   placeholder="Nhập link trailer" autocomplete="off">
                                            <span class="text-danger input-error" id="TrailerError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="moTa">Mô tả <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="3" id="moTa" placeholder="Nhập mô tả phim"></textarea>
                                            <span class="text-danger input-error" id="moTaError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ngayKhoiChieu">Ngày khởi chiếu <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" id="ngayKhoiChieu" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <span class="text-danger input-error" id="ngayKhoiChieuError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục <span class="text-danger">*</span></label>
                                            <select id="danhMuc" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="danhMuc">
                                                @foreach($danhmucs as $index => $danhmuc)
                                                    <option value="{{$danhmuc->maDanhMuc}}">{{$danhmuc->tenDanhMuc}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger input-error" id="danhMucError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="giaVe">Giá vé <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="giaVe"
                                                   placeholder="Nhập giá vé" autocomplete="off">
                                            <span class="text-danger input-error" id="giaVeError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin diễn viên </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <div class="row">
                                           <div class="col-md-12">
                                               <div class="form-group">
                                                   <label>Chọn diễn viên <span class="text-danger">*</span></label>
                                                   <select class="select2" multiple="multiple" id="dienVien" data-placeholder="Chọn diễn viên" style="width: 100%;">
                                                       @foreach($dienviens as $index => $dienvien)
                                                       <option value="{{$dienvien->maDienVien}}">{{$dienvien->tenDienVien}}</option>
                                                       @endforeach
                                                   </select>
                                                   <span class="text-danger input-error" id="dienVienError"></span>
                                               </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin nhà sản xuất</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Chọn nhà sản xuất <span class="text-danger">*</span></label>
                                                    <select class="select2" multiple="multiple" id="nhaSanXuat" data-placeholder="Chọn nhà sản xuất" style="width: 100%;">
                                                       @foreach($nhasxs as $index => $nhasx)
                                                        <option value="{{$nhasx->maNhaSanXuat}}">{{$nhasx->tenNhaSanXUat}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger input-error" id="nhaSanXuatError"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Thông tin đạo diễn</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body" style="display: block;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Chọn đạo diễn <span class="text-danger">*</span></label>
                                                    <select class="select2" multiple="multiple" id="daoDien" data-placeholder="Chọn đạo diễn" style="width: 100%;">
                                                        @foreach($daodiens as $index => $daodien)
                                                            <option value="{{$daodien->maDaoDien}}">{{$daodien->tenDaoDien}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger input-error" id="daoDienError"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="hinhAnh">Hình ảnh</label>
                                          <br>
                                            <button type="button" id="btn-upload-image" class="btn btn-success">Thêm hình ảnh</button>
                                          <input type="file" id="image-film" style="display: none;" multiple>
                                      </div>
                                  </div>
                                    <div id="image-preview-container"></div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnSaveFilm">Lưu thông tin</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
