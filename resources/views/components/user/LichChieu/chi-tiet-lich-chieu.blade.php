@extends('layouts.user-layout')
@section('title', 'Chi tiết lịch chiếu')
@push('js')
    <script src="{{asset('assets/js/function/lich-chieu/chi-tiet-lich-chieu.js')}}"></script>
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
    <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endpush
@section('content')
    <div class="bg-dark border-bottom text-white featured-movie">
        <div class="container pt-3 pb-3">
            <div class="row row-sm">
                <div class="d-none d-sm-block col-2">
                    <a
                        href="/phim/{{$film->slug}}"
                        title="{{$film->tenPhim}}"
                    >
                        <img
                            alt="{{$film->tenPhim}}"
                            src="{{asset($film->linkHinhAnh)}}"
                            class="img-fluid rounded border ls-is-cached lazyloaded"
                        />
                    </a>
                </div>
                <div class="col-12 col-sm-10">
                    <div class="mb-3 text-center text-sm-left">
                        <h1 class="mb-0 text-truncate">
                            <a
                                href="/phim/{{$film->slug}}"
                                title="{{$film->tenPhim}}"
                                class="title-chi-tiet-phim"
                            >
                                {{$film->tenPhim}}
                            </a>
                        </h1>
                        <p class="mb-0 text-muted text-truncate">{{$film->tenDanhMuc}}</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                           
                            <p class="mb-3 text-justify">
                               {{$film->moTaPhim}}
                            </p>

                            <div class="row mb-3">


                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-calendar"></i>
                                        <span class="d-none d-sm-inline-block"
                                        >Khởi chiếu</span
                                        > </strong
                                    ><br/>
                                    <span>{{$film->ngayKhoiChieu}}</span>
                                </div>

                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-clock"></i>
                                        <span class="d-none d-sm-inline-block"
                                        >Thời lượng</span
                                        > </strong
                                    ><br/>
                                    <span>{{$film->thoiLuong}} phút</span>
                                </div>

                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-user-check"></i>
                                        <span class="d-none d-sm-inline-block"
                                        >Giới hạn tuổi</span
                                        > </strong
                                    ><br/>
                                    <span>{{$film->gioiHanTuoi}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <p class="mb-2">
                                <strong> Diễn viên</strong><br/>
                                <span>
                                      @foreach($actors as $actor)
                                                        <a
                                                            class="text-danger"
                                                            href="/nghe-sy/{{ Str::slug($actor->tenDienVien) }}"
                                                            data-toggle="tooltip"
                                                            title=""
                                                            data-original-title=""
                                                        >
                                                            {{ $actor->tenDienVien }}
                                                        </a>
                                                        @if(!$loop->last)
                                                            <span class="text-white">,</span>
                                                        @endif
                                      @endforeach
                      </span>
                            </p>

                            <p class="mb-2">
                                <strong> Đạo diễn</strong><br/>
                                <span>
                       @foreach($directors as $director)
                                        <a
                                            class="text-danger"
                                            href="/nghe-sy/{{ Str::slug($director->tenDaoDien) }}"
                                            data-toggle="tooltip"
                                            title=""
                                            data-original-title=""
                                        >
                                                            {{ $director->tenDaoDien }}
                                                        </a>
                                        @if(!$loop->last)
                                            <span class="text-white">,</span>
                                        @endif
                                    @endforeach
                      </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border-bottom sticky-movie-bars">
            <div class="container">
                <ul class="nav nav-tabs border-bottom-0">
                    <li class="nav-item">
                        <a
                            href="{{route('thong-tin-phim', ['slug' => $film->slug])}}"
                            class="nav-link text-center"
                        >
                            Thông tin phim
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="{{route('LichChieuView', ['slug' => $film->slug])}}"
                            class="nav-link text-center active"
                        >
                            Lịch chiếu
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-block">
                        <a
                            href="{{route('TinTucByFilm', ['slug' => $film->slug])}}"
                            class="nav-link text-center"
                        >
                            Tin tức
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="text-center mb-3">
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-sm" style="width: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <select class="form-control btn-select-region select2"
                                        data-toggle="select" tabindex="-1" aria-hidden="true"
                                        id="provinces"
                                >
                                    @foreach($provinces as $province)
                                    <option value="{{$province->maTinh}}">{{$province->tenTinh}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-group btn-block mb-3" id="dates" style="margin-top:25px;">
                    @foreach($dates as $index => $date)
                        <a
                            class="btn {{$index == 0 ? 'active' : ''}} btn-light text-muted date btn-date-choose-in-ticket"
                            data-date="{{$date[1]}}"
                        >
                            {{$date[0]}}
                            <br /><span class="small text-nowrap"> {{$date[2]}}</span>
                        </a>
                    @endforeach

                </div>

                <div id="showtimes">
                    <div class="card" style="width: 100%">
                        <div class="list-group list-group-flush" id="area-suat-chieu">


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
            </div>
        </div>

    </div>
@endsection
