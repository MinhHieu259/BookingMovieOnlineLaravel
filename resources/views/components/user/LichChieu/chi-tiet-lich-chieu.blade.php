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
                            <div class="btn-block text-sm-left text-center mb-3">
                                <a
                                    href="#"
                                    class="btn btn-light btn-sm btn-do-movie-like"
                                    data-id="16293"
                                    data-token="b5fe9dd8b610c730f7bbbbdf76c8a4b.3qTO8ORJ9vAak7AIPcG3rMHzyQLvHubLj4vl4GLWjaY.iszjvdMOvrQi_PlsX-zwxJSq8WyEa7Kk5-3Qmhfj6N6d6oqlsSCfnn7M2w"
                                >
                                    <i class="icon-heart"></i>
                                    Thích
                                </a>

                                <a
                                    href="/movie/rate/16293"
                                    class="btn btn-white btn-sm btn-do-movie-rate"
                                    data-toggle="modal"
                                    data-target="#ratingModal"
                                    rel="tooltip"
                                    title="Soạn đánh giá"
                                    data-backdrop="static"
                                    data-keyboard="false"
                                >
                                    <i class="icon-star"></i>
                                    Đánh giá
                                </a>

                                <a
                                    href="/video/17897/"
                                    class="btn btn-outline-light btn-sm"
                                    data-toggle="modal"
                                    data-target="#videoModal"
                                    data-video-id="17897"
                                    data-video-url="UQi44Yoef98"
                                    data-remote="false"
                                >
                                    Trailer
                                </a>

                                <a
                                    href="/mua-ve/{{$film->slug}}"
                                    class="btn btn-danger btn-sm"
                                >
                                    Mua vé
                                </a>
                            </div>

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
                                    <span>135 phút</span>
                                </div>

                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-user-check"></i>
                                        <span class="d-none d-sm-inline-block"
                                        >Giới hạn tuổi</span
                                        > </strong
                                    ><br/>
                                    <span>NC16</span>
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
                            href="/phim/ant-man-and-the-wasp-quantumania/"
                            class="nav-link text-center"
                        >
                            Thông tin phim
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/lich-chieu/ant-man-and-the-wasp-quantumania/"
                            class="nav-link text-center active"
                        >
                            Lịch chiếu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/review/ant-man-and-the-wasp-quantumania/"
                            class="nav-link text-center"
                        >
                            Đánh giá
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-block">
                        <a
                            href="/tin-tuc/ant-man-and-the-wasp-quantumania/1ed03939-b71d-69b6-8ed3-02d6e652ea62"
                            class="nav-link text-center"
                        >
                            Tin tức
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            href="/mua-ve/ant-man-and-the-wasp-quantumania/"
                            class="nav-link text-center"
                        >
                            Mua vé
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
