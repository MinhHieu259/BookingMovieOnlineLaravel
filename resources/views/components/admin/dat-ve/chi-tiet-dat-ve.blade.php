@extends('layouts.admin-layout')
@section('title', 'Chi tiết đơn đặt vé')
@push('js')
{{--    <script src="{{asset('admin/function/dat-ve/danh-sach-don-dat.js')}}"></script>--}}

@endpush
@push('css')

@endpush
@section('content')
    <div class="container">
        <h4 class="text-center text-primary">Chi tiết đặt vé</h4>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Thông tin về lịch sử</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="maLichSu">Mã lịch sử</label>
                                <input type="text" value="{{$lichSu->maLichSu}}" class="form-control" id="maLichSu" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="thoiGianDat">Thời gian đặt</label>
                                <input type="text" value="{{$lichSu->thoiGianDat}}" class="form-control" id="thoiGianDat" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tienDat">Tổng tiền</label>
                                <input value="{{number_format($lichSu->tienDat)}}" type="text" class="form-control" id="tienDat" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nguoiDat">Người đặt</label>
                                <input type="text" value="{{$lichSu->username}}" class="form-control" id="nguoiDat" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trangThai">Trạng thái</label>
                                <input type="text" value="{{$lichSu->trangThai == '1' ? 'Chưa chiếu' : 'Đã chiếu'}}" class="form-control" id="trangThai" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="loaiThanhToan">Loại thanh toán</label>
                                <input type="text" value="{{$lichSu->loaiThanhToan}}" class="form-control" id="loaiThanhToan" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
        </div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Thông tin về rạp</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tenCumRap">Tên cụm rạp</label>
                            <input type="text" value="{{$lichSu->tenRap}}" class="form-control" id="tenCumRap" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phong">Phòng</label>
                            <input type="text" value="{{$lichSu->tenPhong}}" class="form-control" id="phong" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ghe">Danh sách ghế</label>
                            <input type="text" value="{{$seatValues}}" class="form-control" id="ghe" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tenPhim">Tên phim</label>
                            <input type="text" value="{{$lichSu->tenPhim}}" class="form-control" id="tenPhim" readonly>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Đồ ăn kèm theo</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                @forelse($chiTietLichSu as $doAn)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tenDoAn">Tên đồ ăn</label>
                            <input type="text" value="{{$doAn->tenDoAn}}" class="form-control" id="tenDoAn" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="soLuong">Số lượng</label>
                            <input type="text" value="{{$doAn->soLuong}}" class="form-control" id="soLuong" readonly>
                        </div>
                    </div>
                </div>
                @empty
                    <h5>Không có đồ ăn trong đơn đặt này</h5>
                @endforelse
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
