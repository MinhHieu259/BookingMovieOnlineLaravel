@extends('layouts.user-layout')
@section('title', 'Trang chủ')
@push('css')
    <!-- Thêm đường dẫn tới CSS của SweetAlert -->
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet">
@endpush
@push('js')
    <!-- Thêm đường dẫn tới JavaScript của SweetAlert -->
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/js/function/auth/Auth.js')}}"></script>
    @if(Session::has('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: '{{ Session::get('message') }}',
            });
        </script>
    @endif

@endpush
@push('popup')
    <!-- Modal login -->
    <div
        class="modal left fade"
        id="popupLogin"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <label for="#username">Tài khoản</label>
                    <input id="username" value="{{old('username')}}" name="username" type="text"
                           class="form-control  @error('username') is-invalid @enderror"/>
                    <span class="text-danger input-error" id="usernameError"></span>
                    <a href="#" class="forgotPassword">Quên mật khẩu</a>
                    <label for="#password">Mật khẩu</label>
                    <input id="password" value="{{old('password')}}" name="password" type="password"
                           class="form-control  @error('password') is-invalid @enderror"/>
                    <span class="text-danger input-error" id="passwordError"></span>
                    <button id="btnLoginPopup" type="button" class="btn btn-login">Đăng nhập</button>

                    <p class="orLableLogin">Hoặc</p>
                    <button class="btn btn-primary btn-login-facebook">
                        <i class="fa-brands fa-facebook"></i> Đăng nhập bằng Facebook
                    </button>
                    <p class="no-have-account">
                        Chưa có tài khoản? <a href="{{route('RegisterPage')}}">Đăng ký ngay</a>
                    </p>
                </div>
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- modal -->

    <!--Modal province-->
    <div
        class="modal right fade"
        id="modelProvince"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tìm theo tỉnh thành phố">
                        </div>
                    </div>
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action"><b>Tp. Hồ Chí Minh</b>
                            <br>
                            <span class="number-rap">56 rạp</span>
                        </button>
                        <button type="button" class="list-group-item list-group-item-action"><b>Tp. Hồ Chí Minh</b>
                            <br>
                            <span class="number-rap">56 rạp</span>
                        </button>
                        <button type="button" class="list-group-item list-group-item-action"><b>Tp. Hồ Chí Minh</b>
                            <br>
                            <span class="number-rap">56 rạp</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--Modal province-->
@endpush
@section('content')
    <div class="bg-white border-top border-bottom mt-3 pt-4">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"
                             src="{{asset('assets/images/user/slider1.jpg')}}"
                             alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                             src="{{asset('assets/images/user/slider2.jpg')}}"
                             alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"
                             src="{{asset('assets/images/user/slider3.jpg')}}"
                             alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <h2 class="text-center">
                <a class="text-processing" href="{{route('dang-chieu')}}">Đang chiếu</a>
                <span class="saperate">|</span>
                <a href="{{route('sap-chieu')}}" class="text-pending">Sắp chiếu</a>
            </h2>

            <div class="container">
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
                                        <img
                                            src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort
                                            hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                            src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort
                                            hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                            src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort
                                            hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                            src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort
                                            hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                            src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">Tin điện ảnh - anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>
                                        <p class="desc-review">Biệt Đội Rất Ổn hé lộ loạt bối cảnh trong phim: từ resort
                                            hạng sang đến biệt thự, nhà cổ và cả miền Tây sông nước đủ cả!</p>
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
                                        <img width="110" height="80"
                                             src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                             alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img width="110" height="80"
                                             src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                             alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>

                                    </div>
                                </div>
                                <hr>
                            </div>

                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img width="110" height="80"
                                             src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/small/64059fc1253ad195852573.jpeg"
                                             alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="#">Biệt Đội Rất Ổn và một miền tây khác lạ từ đạo
                                            diễn Tạ Nguyên Hiệp</a>
                                        <p class="name-cate-review">anna787 - <span
                                                class="time-post-review">5 giờ trước</span></p>

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
