<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/user/mascot.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/slider.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}"/>
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/spin.css')}}">
    @stack('css')

</head>
<body>
@include('layouts.includes.user._header')

<div id="app">
    <div id="loading" style="display:none;">
        <div class="loader"></div>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
{{--    @include('layouts.includes.user._footer')--}}
</div>
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
></script>
<script src="{{asset('assets/js/slider.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/function/auth/Auth.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                },
            },
        });

        $('.carousel').carousel({
            interval: 2000
        })
    })
</script>
<script src="{{asset('assets/js/common.js')}}"></script>
@stack('js')
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
                <a href="{{route('login.google')}}" class="btn btn-secondary btn-login-facebook">
                    <i class="fa-brands fa-google"></i> Đăng nhập bằng Google
                </a>
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
@stack('popup')
</body>
</html>

