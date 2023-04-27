@extends('layouts.user-layout')
@section('title', 'Đăng ký tài khoản')
@push('js')

@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-1 order-md-2 mb-5 mb-md-0 d-none d-md-block">

                <!-- Image -->
                <div class="text-center">
                    <img src="{{asset('assets/images/user/mascot.png')}}" alt="Moveek" class="img-fluid mt-4">
                </div>

            </div>
            <div class="col-12 col-md-6 col-xl-5 order-md-1 my-5">

                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Đăng ký tài khoản
                </h1>
                @if(\Illuminate\Support\Facades\Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('message')}}
                    </div>
                @endif

                @if(\Illuminate\Support\Facades\Session::has('messageError'))
                    <div class="alert alert-danger" role="alert">
                        {{\Illuminate\Support\Facades\Session::get('messageError')}}
                    </div>
                @endif
                <form name="fos_user_registration_form" method="post" action="{{route('DoRegister')}}"
                      class="fos_user_registration_register">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group"><label for="email" class="required">Email:</label><input
                                    id="email"
                                    value="{{old('email')}}"
                                    name="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group"><label for="username" class="required">Tên
                                    đăng nhập:</label><input type="text" id="username"
                                                             name="username"
                                                             value="{{old('username')}}"
                                                             class="form-control  @error('username') is-invalid @enderror">
                            </div>
                            @error('username')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group"><label for="password"
                                                           class="required">Mật khẩu:</label><input type="password"
                                                                                                    id="password"
                                                                                                    value="{{old('password')}}"
                                                                                                    name="password"
                                                                                                    class="form-control @error('password') is-invalid @enderror"
                                >
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group"><label for="confirmPassword"
                                                           class="required">Xác nhận mật khẩu:</label><input
                                    type="password"
                                    id="confirmPassword"
                                    value="{{old('confirmPassword')}}"
                                    name="confirmPassword"
                                    class="form-control @error('confirmPassword') is-invalid @enderror">
                                @error('confirmPassword')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-dark mb-3 btn-submit">Tạo tài khoản</button>
                </form>

                <!-- Link -->
                <div class="text-center mb-3">
                    <small class="text-muted">hoặc</small>
                </div>

                <a href="#" class="btn btn-lg btn-block btn-primary mb-3 btn-do-facebook-login"
                   data-target-path="/register/">
                    <i class="fe fe-facebook"></i> Đăng nhập bằng Facebook
                </a>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted">
                        Đã có tài khoản? <a href="{{route('LoginPage')}}">Đăng nhập</a>!
                    </small>
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
@endsection
