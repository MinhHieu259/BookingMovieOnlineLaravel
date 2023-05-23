@extends('layouts.user-layout')
@section('title', 'Phim đang chiếu')
@push('js')
    <script src="{{asset('assets/js/function/phim/dang-chieu.js')}}"></script>
@endpush
@section('content')
    <div class="bg-white border-top border-bottom mt-3 pt-4">
        <div id="lich-chieu-background">
            <div class="container pt-4 pb-4">
                <div class="text-center">
                    <h1 class="mb-3 text-white" style="font-size: 25px">
                        Phim Đang Chiếu
                    </h1>
                    <div class="text-white mt-0 description">
                        Danh sách các phim hiện đang chiếu tại các hệ thống rạp trên
                        toàn quốc
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-4 col-sm-12">
                        <div class="dropdown genre-dropdown mb-4">
                            <a
                                href="#"
                                class="btn btn-outline-dark btn-block dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Tất cả</a
                            >
                            <ul class="dropdown-menu">
                                <li>
                                    <span style="cursor: pointer"
                                          class="dropdown-item btn-choose-genre"
                                          data-genre="Tất cả"
                                    >Tất cả</span
                                    >
                                </li>
                                @foreach($categorys as $cate)
                                <li>
                                    <span style="cursor: pointer"
                                        class="dropdown-item btn-choose-genre"
                                        data-genre="{{$cate->tenDanhMuc}}"
                                          data-cate="{{$cate->maDanhMuc}}"
                                    >{{$cate->tenDanhMuc}}</span
                                    >
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="dropdown language-dropdown mb-4">
                            <a
                                href="#"
                                class="btn btn-outline-dark btn-block dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Tất cả</a
                            >
                            <ul class="dropdown-menu">
                                <li>
                                    <span
                                        class="dropdown-item btn-choose-language active"
                                        data-language="Tất cả"
                                    >Tất cả</span
                                    >
                                </li>
                                <li>
                                    <span
                                        class="dropdown-item btn-choose-language"
                                        data-language="Tiếng Anh"
                                    >Tiếng Anh</span
                                    >
                                </li>
                                <li>
                                    <span
                                        class="dropdown-item btn-choose-language"
                                        data-language="Tiếng Việt"
                                    >Tiếng Việt</span
                                    >
                                </li>
                                <li>
                                    <span
                                        class="dropdown-item btn-choose-language"
                                        data-language="Tiếng Trung"
                                    >Tiếng Trung</span
                                    >
                                </li>
                                <li>
                                    <span
                                        class="dropdown-item btn-choose-language"
                                        data-language="Tiếng Hàn"
                                    >Tiếng Hàn</span
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row" id="contentFilmDangChieu">
                    @foreach($films as $film)
                    <div class="col-md-2 card-wrap-dang-chieu">
                        <a href="{{route('LichChieuView', ['slug' => $film->slug])}}">
                            <div class="card card-carousel card-dang-chieu">
                                <img
                                    src="{{asset($film->linkHinhAnh)}}"
                                    alt="anh"
                                    class="card-img-top"
                                />
                                <div class="card-body">
                                    <h6 style="margin-top: -15px;font-size: 13px">{{$film->tenPhim}}</h6>
                                    <p class="date-show" style="margin-top: -7px;font-size: 10px">{{$film->ngayKhoiChieu}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
