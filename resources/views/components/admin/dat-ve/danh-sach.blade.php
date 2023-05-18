@extends('layouts.admin-layout')
@section('title', 'Danh sách đặt vé')
@push('js')
    <script src="{{asset('admin/function/dat-ve/danh-sach-don-dat.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-3">
                <label for="trangThai">Trạng thái</label>
                <select id="trangThai" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        tabindex="-1" aria-hidden="true" data-select2-id="trangThai">
                    <option value="1">Chưa chiếu</option>
                    <option value="2">Đã chiếu</option>
                </select>
            </div>

            <div class="col-md-2 mt-3">
                <label for="ngayDat">Ngày đặt</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" id="ngayDat" class="form-control datetimepicker-input"
                           data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 mt-3">
                <label for="cumRap">Cụm rạp</label>
                <select id="cumRap" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        tabindex="-1" aria-hidden="true" data-select2-id="cumRap">
                    <option value=""></option>
                    @foreach($theaters as $theater)
                    <option value="{{$theater->maChiTietRap}}">{{$theater->tenRap}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mt-3">
                <label for="Phim">Phim</label>
                <select id="Phim" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                        tabindex="-1" aria-hidden="true" data-select2-id="Phim">
                    <option value=""></option>
                    @foreach($films as $film)
                        <option value="{{$film->maPhim}}">{{$film->tenPhim}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <table id="table-dat-ve-admin" class="table table-bordered table-hover mt-5">
            <thead>
            <tr>
                <th style="width: 10%">Mã lịch sử</th>
                <th>Thời gian đặt</th>
                <th>Tiền đặt</th>
                <th>Người đặt</th>
                <th>Trạng thái</th>
                <th>Loại thanh toán</th>
                <th style="width: 12%">Thao tác</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
