@extends('layouts.user-layout')
@section('title', 'Chi tiết rạp')
@section('content')
    <div class="bg-light border-bottom">
        <div class="container pt-3 pb-3">
            <div class="row row-sm">
                <div class="d-none d-sm-block col-1">
                    <img
                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/5fffb2fcaf3c1018282624.png"
                        class="img-fluid rounded-circle border p-1 bg-white"
                    />
                </div>
                <div class="col-12 col-sm-11">
                    <div class="mb-3">
                        <h1 class="mb-0" style="font-size: 1.625rem">
                            Beta Đan Phượng
                        </h1>
                        <p class="mb-0 small text-muted text-truncate">
                            Tầng 2 Tòa nhà HHA, Khu Đô Thị XPHomes (Tân Tây Đô), Xã Tân
                            Lập, Huyện Đan Phượng, TP Hà Nội
                        </p>
                        <div class="mb-0 small">
                            <a
                                href="https://maps.google.com/?q=Beta Đan Phượng"
                                target="_blank"
                                class="text-muted flex-"
                            >
                                <i class="fe fe-map-pin"></i>
                                Bản đồ
                            </a>
                            <a
                                href="#"
                                class="text-muted ml-3"
                                data-toggle="modal"
                                data-target="#ticketModal"
                                data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219e8046e21026086857.jpg"
                            >
                                <i class="fe fe-layout"></i>
                                Giá vé
                            </a>
                            <a
                                href="/rap-khu-vuc/ha-noi/"
                                class="text-muted ml-3 d-none d-sm-inline-block"
                            >
                                <i class="fe fe-globe"></i>
                                Hà Nội
                            </a>
                            <a
                                href="/he-thong-rap/beta-cineplex/"
                                class="text-muted ml-3"
                            >
                                <i class="fe fe-list"></i>
                                Beta Cinemas
                            </a>
                        </div>
                    </div>

                    <p class="mb-0">
                        Xem lịch chiếu phim và Mua vé xem phim tại Beta Đan Phượng.
                        Moveek - Xem Lịch chiếu toàn quốc đầy đủ &amp; tiện lợi nhất.
                        Rạp Beta Đan Phượng nằm ở tòa nhà HHA khu đô thị Tân Tây Đô,
                        là 1 trong 3 rạp chiếu phim của Beta tại Hà Nội, luôn cam kết
                        chất lượng dịch vụ tốt nhất. Beta Đan Phượng có 5 phòng chiếu
                        - 477 chỗ ngồi, có 1 phòng chiếu phim 3D.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="text-center mb-3"></div>

        <div class="row">
            <div class="col-md-8">
                <div id="showtimes">
                    <div class="showtimes">
                        <div
                            class="btn-group btn-block showtime-dates mb-3"
                            id="dates"
                        >
                            <a
                                class="btn btn-light text-muted date"
                                data-date="2023-03-15"
                                style="width: 102px"
                            >
                                15/3
                                <br /><span class="small text-nowrap">Th 4</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date active"
                                data-date="2023-03-16"
                                style="width: 102px"
                            >
                                16/3
                                <br /><span class="small text-nowrap">Th 5</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date"
                                data-date="2023-03-17"
                                style="width: 102px"
                            >
                                17/3
                                <br /><span class="small text-nowrap">Th 6</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date"
                                data-date="2023-03-18"
                                style="width: 102px"
                            >
                                18/3
                                <br /><span class="small text-nowrap">Th 7</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date"
                                data-date="2023-03-19"
                                style="width: 102px"
                            >
                                19/3
                                <br /><span class="small text-nowrap">CN</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date"
                                data-date="2023-03-20"
                                style="width: 102px"
                            >
                                20/3
                                <br /><span class="small text-nowrap">Th 2</span>
                            </a>
                        </div>

                        <div class="alert alert-warning mb-3">
                            <i class="fe fe-info"></i> Nhấn vào suất chiếu để tiến hành
                            mua vé
                        </div>

                        <div
                            class="card card-sm mb-3"
                            data-movie="sieu-lua-gap-sieu-lay"
                            data-movie-id="16293"
                            style="width: 100%;"
                        >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <a href="/phim/sieu-lua-gap-sieu-lay/">
                                            <img
                                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/mini/63e78adaa7634025342084.png"
                                                alt="Siêu Lừa Gặp Siêu Lầy"
                                                class="rounded img-fluid"
                                            />
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <h4 class="card-title mb-1 name">
                                            <a href="/phim/sieu-lua-gap-sieu-lay/">
                                                Siêu Lừa Gặp Siêu Lầy
                                            </a>
                                        </h4>

                                        <p class="card-text small text-muted mb-0">
                                            NC16 · 2h15' ·
                                            <a
                                                href="/video/17897/"
                                                data-toggle="modal"
                                                data-target="#videoModal"
                                                data-video-id="17897"
                                                data-video-url="UQi44Yoef98"
                                                data-remote="false"
                                            >Trailer</a
                                            >
                                        </p>

                                        <div class="mt-2">
                                            <div class="mb-1">
                                                <label
                                                    class="small mb-2 font-weight-bold d-block text-dark"
                                                >
                                                    2D Phụ Đề Anh
                                                </label>
                                                <a
                                                    href="/mua-ve/beta/126701/4800ff83-6b21-4f7e-8527-6699478d5219"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876746"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_4800ff83-6b21-4f7e-8527-6699478d5219"
                                                >
                                                    <span class="time">10:15</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/8c2ebca2-0ee0-4210-96bc-09d4aa1a0088"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876747"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_8c2ebca2-0ee0-4210-96bc-09d4aa1a0088"
                                                >
                                                    <span class="time">11:30</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/68c896ee-a936-4414-b15a-75b820d818ec"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876748"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_68c896ee-a936-4414-b15a-75b820d818ec"
                                                >
                                                    <span class="time">13:30</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/aa464a7d-de0d-415a-8070-d5ff9bfcba48"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876800"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_aa464a7d-de0d-415a-8070-d5ff9bfcba48"
                                                >
                                                    <span class="time">15:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/29a6b5d6-6d39-4300-aeab-3a11e3d67ac9"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876749"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_29a6b5d6-6d39-4300-aeab-3a11e3d67ac9"
                                                >
                                                    <span class="time">16:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/ee6e591c-5118-451b-a593-5aaa87385d51"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876750"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_ee6e591c-5118-451b-a593-5aaa87385d51"
                                                >
                                                    <span class="time">17:30</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/71e1c376-1b7c-4a79-a7b8-9555f9bdd366"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876751"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_71e1c376-1b7c-4a79-a7b8-9555f9bdd366"
                                                >
                                                    <span class="time">20:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126701/1904c136-3dbe-448d-a1f1-243469f73499"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-dan-phuong"
                                                    data-id="277876752"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126701_1904c136-3dbe-448d-a1f1-243469f73499"
                                                >
                                                    <span class="time">21:00</span>
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
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
