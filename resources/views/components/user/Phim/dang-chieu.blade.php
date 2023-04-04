@extends('layouts.user-layout')
@section('title', 'Phim đang chiếu')
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
                        <div class="dropdown sort-dropdown mb-4">
                            <a
                                href="#"
                                class="btn btn-outline-dark btn-block dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Phổ biến</a
                            >
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-sort"
                                        href="#"
                                        data-sort="popular"
                                    >Phổ biến</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-sort active"
                                        href="#"
                                        data-sort="latest"
                                    >Mới nhất</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 col-sm-12">
                        <div class="dropdown genre-dropdown mb-4">
                            <a
                                href="#"
                                class="btn btn-outline-dark btn-block dropdown-toggle"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >Hành động</a
                            >
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="all"
                                    >Tất cả</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre active"
                                        href="#"
                                        data-genre="action"
                                    >Hành động</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="horror"
                                    >Kinh dị</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="family"
                                    >Gia đình</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="comedy"
                                    >Hài</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="romance"
                                    >Tình cảm</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-genre"
                                        href="#"
                                        data-genre="drama"
                                    >Tâm lý</a
                                    >
                                </li>
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
                            >Ngôn ngữ</a
                            >
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-language active"
                                        href="#"
                                        data-language="all"
                                    >Tất cả</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-language"
                                        href="#"
                                        data-language="english"
                                    >Tiếng Anh</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-language"
                                        href="#"
                                        data-language="vietnamese"
                                    >Tiếng Việt</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-language"
                                        href="#"
                                        data-language="chinese"
                                    >Tiếng Trung</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item btn-choose-language"
                                        href="#"
                                        data-language="korean"
                                    >Tiếng Hàn</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px">Nhà bà nữ</h6>
                                <p class="date-show" style="margin-top: -7px">22/01</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
