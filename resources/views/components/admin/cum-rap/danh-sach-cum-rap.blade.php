@extends('layouts.admin-layout')
@section('title', 'Danh sách cụm rạp')
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@push('popup')
    @include('layouts.includes.admin.popup.cum-rap.popup-delete-cum-rap')
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách cụm rạp</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách cụm rạp</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <table id="table-cum-rap" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th style="width: 9%">Mã rạp</th>
                    <th>Tên Rạp</th>
                    <th>Địa chỉ</th>
                    <th style="width: 12%">Thao tác</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($cumraps as $index => $cumrap)--}}
{{--                    <tr>--}}
{{--                        <td>{{$index + 1}}</td>--}}
{{--                        <td>{{$cumrap->tenRap}}</td>--}}
{{--                        <td>{{$cumrap->diaChi}}</td>--}}
{{--                        <td class="text-center">--}}
{{--                            <a href="{{route('admin.editcumrap', $cumrap->maChiTietRap)}}" class="btn btn-warning btn-sm float-left">Cập nhật</a>--}}
{{--                            <button class="btn btn-danger btn-sm float-right btnDeleteCumRap" data-ma-cum="{{ $cumrap->maChiTietRap }}">Xóa</button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}

                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('js')
    <script src="{{asset('admin/function/cum-rap.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#table-cum-rap').DataTable({--}}
{{--                "paging": true,--}}
{{--                "lengthChange": false,--}}
{{--                "searching": true,--}}
{{--                "ordering": true,--}}
{{--                "info": true,--}}
{{--                "autoWidth": false,--}}
{{--                "responsive": true,--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush
