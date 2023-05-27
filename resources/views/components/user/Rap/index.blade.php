@extends('layouts.user-layout')
@section('title', 'Tìm kiếm rạp')
@push('js')
    <script src="{{asset('assets/js/function/rap/filter-rap.js')}}"></script>
    <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="card lists mb-0 mt-5" style="width: 100%">
            <div class="card-header">
                <div class="row align-items-center pt-3">
                    <div class="col">
                        <!-- Search -->
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4 col-lg-3 mb-3 mb-3 mb-md-0 pr-3 pr-md-0">
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="search cinema-search"
                                           style="border: gray 1px solid; border-radius: 3px"
                                           placeholder="Nhập tên rạp"
                                           autocomplete="off"
                                           id="tenRap"
                                           >
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-4">
                                <select class="form-control btn-select-region select2"
                                        data-toggle="select" tabindex="-1" aria-hidden="true"
                                        id="provinces"
                                >
                                @foreach ($provinces as $province)
                                    <option value="{{$province->maTinh}}">{{$province->tenTinh}}</option>
                                @endforeach
                                </select></div>
                        </div>

                    </div>
                    <div class="col-auto"></div>
                </div> <!-- / .row -->
            </div>
            <div class="pt-3 list-theater-search">

            </div>
        </div>
    </div>
@endsection
