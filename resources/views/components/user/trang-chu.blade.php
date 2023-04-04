@extends('layouts.user-layout')
@section('title', 'Trang chủ')
@section('content')
    <div class="bg-white border-top border-bottom mt-3 pt-4">
        <div class="container">
            <h2 class="text-center">
                <a class="text-processing" href="{{route('dang-chieu')}}">Đang chiếu</a>
                <span class="saperate">|</span>
                <a href="{{route('sap-chieu')}}" class="text-pending">Sắp chiếu</a>
            </h2>

            <div class="container mt-3 p-5">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card card-carousel">
                            <img
                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63997b15039b6730562464.jpg"
                                alt="anh"
                                class="card-img-top"
                            />
                            <a href="#" class="btn btn_book">Mua vé</a>
                            <div class="card-body" style="padding: 10px;">
                                <h6 class="name-film-slide">Nhà bà nữ</h6>
                                <span class="date-show">22/01</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="area-review">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card review-new">
                        <div class="card-header card-header-review">Mới cập nhật</div>
                        <div class="card-body">
                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card review-right">
                        <div class="card-header card-header-review">Review</div>
                        <div class="card-body">
                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img width="110" height="80" src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span class="time-post-review">5 giờ trước</span></p>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img width="110" height="80" src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span class="time-post-review">5 giờ trước</span></p>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img width="110" height="80" src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg" alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span class="time-post-review">5 giờ trước</span></p>

                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
