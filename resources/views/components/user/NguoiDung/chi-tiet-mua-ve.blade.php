@extends('layouts.user-layout')
@section('title', 'Chi tiết mua vé')
@push('js')
{{--    <script src="{{asset('assets/js/function/tai-khoan/lich-su-mua-ve.js')}}"></script>--}}
    <!-- Thêm đường dẫn tới JavaScript của SweetAlert -->
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/lich-su-mua-ve.css')}}">
@endpush
@section('content')
    <!-- HEADER -->
    <div class="header">
        <img src="{{asset('assets/images/user/tix-banner.png')}}" class="header-img-top" alt="banner">
    </div>

@endsection
