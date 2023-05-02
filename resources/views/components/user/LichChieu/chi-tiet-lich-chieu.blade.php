@extends('layouts.user-layout')
@section('title', 'Chi tiết lịch chiếu')
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
                                <select class="form-control btn-select-region select2-hidden-accessible"
                                        data-toggle="select" tabindex="-1" aria-hidden="true">
                                    <option value="1">Tp. Hồ Chí Minh</option>
                                    <option value="9">Hà Nội</option>
                                    <option value="7">Đà Nẵng</option>
                                    <option value="3" selected="">Đồng Nai</option>
                                    <option value="4">Bình Dương</option>
                                    <option value="15">Bà Rịa - Vũng Tàu</option>
                                    <option value="12">Khánh Hòa</option>
                                    <option value="6">Cần Thơ</option>
                                    <option value="23">Lâm Đồng</option>
                                    <option value="10">Hải Phòng</option>
                                    <option value="8">Quảng Ninh</option>
                                    <option value="11">Thừa Thiên - Huế</option>
                                    <option value="33">Bắc Ninh</option>
                                    <option value="24">Kiên Giang</option>
                                    <option value="29">Hải Dương</option>
                                    <option value="14">Bình Định</option>
                                    <option value="5">Đắk Lắk</option>
                                    <option value="21">Nghệ An</option>
                                    <option value="49">Tiền Giang</option>
                                    <option value="53">Bình Phước</option>
                                    <option value="18">An Giang</option>
                                    <option value="2">Bắc Giang</option>
                                    <option value="30">Cà Mau</option>
                                    <option value="36">Tây Ninh</option>
                                    <option value="22">Thái Nguyên</option>
                                    <option value="25">Thanh Hóa</option>
                                    <option value="40">Sóc Trăng</option>
                                    <option value="41">Quảng Bình</option>
                                    <option value="47">Lạng Sơn</option>
                                    <option value="42">Quảng Nam</option>
                                    <option value="51">Quảng Ngãi</option>
                                    <option value="52">Kon Tum</option>
                                    <option value="13">Bình Thuận</option>
                                    <option value="19">Bến Tre</option>
                                    <option value="27">Trà Vinh</option>
                                    <option value="28">Vĩnh Long</option>
                                    <option value="16">Ninh Bình</option>
                                    <option value="17">Phú Thọ</option>
                                    <option value="35">Hậu Giang</option>
                                    <option value="20">Thái Bình</option>
                                    <option value="55">Đồng Tháp</option>
                                    <option value="56">Hưng Yên</option>
                                    <option value="31">Hà Tĩnh</option>
                                    <option value="26">Yên Bái</option>
                                    <option value="45">Long An</option>
                                    <option value="57">Hòa Bình</option>
                                    <option value="34">Tuyên Quang</option>
                                    <option value="38">Nam Định</option>
                                    <option value="46">Sơn La</option>
                                    <option value="37">Phú Yên</option>
                                    <option value="50">Quảng Trị</option>
                                    <option value="48">Hà Nam</option>
                                    <option value="43">Ninh Thuận</option>
                                    <option value="44">Gia Lai</option>
                                    <option value="54">Vĩnh Phúc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-group btn-block mb-3" id="dates" style="margin-top:25px;">
                    <a
                        class="btn btn-light text-muted date active btn-date-choose-in-ticket"
                        data-date="2023-03-09"
                    >
                        9/3
                        <br /><span class="small text-nowrap">Th 5</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-10"
                    >
                        10/3
                        <br /><span class="small text-nowrap">Th 6</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-11"
                    >
                        11/3
                        <br /><span class="small text-nowrap">Th 7</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-12"
                    >
                        12/3
                        <br /><span class="small text-nowrap">CN</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-13"
                    >
                        13/3
                        <br /><span class="small text-nowrap">Th 2</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-14"
                    >
                        14/3
                        <br /><span class="small text-nowrap">Th 3</span>
                    </a>
                </div>

                <div id="showtimes">
                    <div class="card" style="width: 100%">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item bg-light btn-select-cineplex sponsored-cineplex-tracking sponsored-cineplex sponsored-cineplex-18789" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample"><div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm">
                                            <img width="50" src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/5fffb2fcaf3c1018282624.png" alt="Beta Cinemas" class="avatar-img rounded">
                                        </div>
                                    </div>
                                    <div class="col ml-n2">
                                        <h4 class="text-body mb-1 name">Beta Cinemas</h4>
                                        <p class="small text-muted mb-0">4 rạp</p>
                                    </div>
                                    <div class="col-auto">
                                        <span class="text-muted h3"><i class="fe fe-chevron-right"></i></span>
                                    </div></div></a>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="width: 100%">
                                    <div class="list-group collapse show" id="showtime-cineplex-18789">
                                        <div class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126701" data-cineplex="beta-cineplex" data-cinema="beta-cineplex-dan-phuong" data-cinema-id="126701" data-toggle="collapse" data-target="#showtime-cinema-126701" aria-expanded="true">
                                            <h4 class="text-body mb-0 name font-weight-normal">
                                                Beta Đan Phượng
                                            </h4>
                                            <div class="cinema mt-0 collapse show" id="showtime-cinema-126701" style="">
                                                <p class="small text-muted mb-3">
                                                    Tầng 2 Tòa nhà HHA, Khu Đô Thị XPHomes (Tân Tây
                                                    Đô), Xã Tân Lập, Huyện Đan Phượng, TP Hà Nội -
                                                    <a href="/rap/beta-cineplex-dan-phuong/">Thông tin rạp</a>
                                                    -
                                                    <a href="https://maps.google.com/?q=Beta Đan Phượng" target="_blank">Bản đồ</a>
                                                    -
                                                    <a href="#" data-toggle="modal" data-target="#ticketModal" data-name="Beta Đan Phượng" data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219e8046e21026086857.jpg">Giá vé</a>
                                                </p>
                                                <div class="showtimes loaded">
                                                    <div class="mb-1">
                                                        <label class="small mb-2 font-weight-bold d-block text-dark">
                                                            2D Phụ Đề Anh
                                                        </label>
                                                        <a href="/mua-ve/beta/126701/72849a9e-b03c-42bf-879e-b44287ea74f9" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146137" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_72849a9e-b03c-42bf-879e-b44287ea74f9">
                                                            <span class="time">10:45</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/6ec6698a-90b9-4a9e-aa01-ed4e0dde8af3" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146138" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_6ec6698a-90b9-4a9e-aa01-ed4e0dde8af3">
                                                            <span class="time">12:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/4d1558d0-4eb1-4a79-9de6-c02f0b1fa9e1" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277257519" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_4d1558d0-4eb1-4a79-9de6-c02f0b1fa9e1">
                                                            <span class="time">13:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/8f1c138c-4d31-455e-aff7-bc42a046cd25" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146139" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_8f1c138c-4d31-455e-aff7-bc42a046cd25">
                                                            <span class="time">14:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/f0401a10-1612-4ec3-a070-262135b240b6" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146140" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_f0401a10-1612-4ec3-a070-262135b240b6">
                                                            <span class="time">16:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/4919977e-6586-47d4-b5e2-806b4db2aae6" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146141" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_4919977e-6586-47d4-b5e2-806b4db2aae6">
                                                            <span class="time">18:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/9a0f606a-f5c9-49bb-8b8c-39065d763875" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146142" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_9a0f606a-f5c9-49bb-8b8c-39065d763875">
                                                            <span class="time">20:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/a55c06b7-2c77-4589-a562-f52e03b85c02" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277257475" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_a55c06b7-2c77-4589-a562-f52e03b85c02">
                                                            <span class="time">21:00</span>
                                                        </a>
                                                        <a href="/mua-ve/beta/126701/2f3a1d5a-0d37-4d89-90a7-bb27467748c2" data-cineplex="beta" data-cinema="beta-cineplex-dan-phuong" data-id="277146143" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing" data-reference="126701_2f3a1d5a-0d37-4d89-90a7-bb27467748c2">
                                                            <span class="time">22:00</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
            </div>
        </div>

    </div>
@endsection
