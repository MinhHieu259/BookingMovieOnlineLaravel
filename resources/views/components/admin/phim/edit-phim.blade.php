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
                    <h1 class="m-0">Cập nhật phim</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.trangchu')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật phim</li>
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
                                            <label for="tenPhimEdit">Tên phim <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="tenPhimEdit"
                                                   placeholder="Nhập tên phim" autocomplete="off" value="{{$phim->tenPhim}}">
                                            <span class="text-danger input-error" id="tenPhimEditError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="TrailerEdit">Trailer <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="TrailerEdit"
                                                   placeholder="Nhập link trailer" autocomplete="off" value="{{$phim->linkTrailer}}">
                                            <span class="text-danger input-error" id="TrailerEditError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="thoiLuongEdit">Thời lượng <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="thoiLuongEdit"
                                                   placeholder="Nhập thời lượng phim" autocomplete="off" value="{{$phim->thoiLuong}}">
                                            <span class="text-danger input-error" id="thoiLuongEditError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gioiHanTuoiEdit">Giới hạn tuổi <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="gioiHanTuoiEdit"
                                                   placeholder="Nhập giới hạn tuổi" autocomplete="off" value="{{$phim->gioiHanTuoi}}">
                                            <span class="text-danger input-error" id="gioiHanTuoiEditError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ngonNguEdit">Ngôn ngữ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="ngonNguEdit"
                                                   placeholder="Nhập ngôn ngữ" autocomplete="off" value="{{$phim->ngonNgu}}">
                                            <span class="text-danger input-error" id="ngonNguEditError"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="moTaEdit">Mô tả <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="3" id="moTaEdit" placeholder="Nhập mô tả phim">{{$phim->moTaPhim}}</textarea>
                                            <span class="text-danger input-error" id="moTaEditError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ngayKhoiChieuEdit">Ngày khởi chiếu <span class="text-danger">*</span></label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" id="ngayKhoiChieuEdit" value="{{$phim->ngayKhoiChieu}}" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <span class="text-danger input-error" id="ngayKhoiChieuEditError"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục <span class="text-danger">*</span></label>
                                            <select id="danhMucEdit" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="danhMucEdit">
                                                @foreach($danhmucs as $index => $danhmuc)
                                                    <option {{$danhmuc->maDanhMuc == $phim->maDanhMuc ? 'selected' : ''}} value="{{$danhmuc->maDanhMuc}}">{{$danhmuc->tenDanhMuc}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger input-error" id="danhMucEditError"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="giaVeEdit">Giá vé <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="giaVeEdit"
                                                   placeholder="Nhập giá vé" autocomplete="off" value="{{$phim->giaVe}}">
                                            <span class="text-danger input-error" id="giaVeEditError"></span>
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
                                                   <select class="select2" multiple="multiple" id="dienVienEdit" data-placeholder="Chọn diễn viên" style="width: 100%;">
                                                       @foreach($dienviens as $index => $dienvien)
                                                       <option value="{{$dienvien->maDienVien}}" {{ in_array($dienvien->maDienVien, json_decode($phim->maDienVien)) ? 'selected' : '' }}>{{$dienvien->tenDienVien}}</option>
                                                       @endforeach
                                                   </select>
                                                   <span class="text-danger input-error" id="dienVienEditError"></span>
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
                                                    <select class="select2" multiple="multiple" id="nhaSanXuatEdit" data-placeholder="Chọn nhà sản xuất" style="width: 100%;">
                                                       @foreach($nhasxs as $index => $nhasx)
                                                        <option value="{{$nhasx->maNhaSanXuat}}" {{ in_array($nhasx->maNhaSanXuat, json_decode($phim->maNhaSanXuat)) ? 'selected' : '' }}>{{$nhasx->tenNhaSanXUat}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger input-error" id="nhaSanXuatEditError"></span>
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
                                                    <select class="select2" multiple="multiple" id="daoDienEdit" data-placeholder="Chọn đạo diễn" style="width: 100%;">
                                                        @foreach($daodiens as $index => $daodien)
                                                            <option value="{{$daodien->maDaoDien}}" {{ in_array($daodien->maDaoDien, json_decode($phim->maDaoDien)) ? 'selected' : '' }}>{{$daodien->tenDaoDien}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger input-error" id="daoDienEditError"></span>
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
                                            <button type="button" id="btn-upload-image-edit" class="btn btn-success">Cập nhật hình ảnh</button>
                                          <input type="file" id="image-film-edit" style="display: none;" multiple>
                                      </div>
                                  </div>
                                    <div id="image-preview-container">
                                        @if(isset($imageOfFilm[0]))
                                            <img style="margin-top: 20px; width: 500px;" src="{{asset($imageOfFilm[0])}}" alt="">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" style="display:none;" class="float-right mt-5 btn btn-danger" id="delete-image-film">Xóa</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" id="btnUpdateFilm">Lưu thông tin</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
