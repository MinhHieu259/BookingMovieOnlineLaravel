@extends('layouts.user-layout')
@section('title', 'Đăng nhập tài khoản')
@push('js')

@endpush
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 offset-xl-1 order-md-2 mb-5 mb-md-0">

                <!-- Image -->
                <div class="text-center">
                    <img src="{{asset('assets/images/user/mascot.png')}}" alt="Moveek" class="img-fluid mt-4">
                </div>

            </div>
            <div class="col-12 col-md-6 col-xl-5 order-md-1 my-5">

                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Đăng nhập
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
                <form role="form" action="{{route('DoLogin')}}" method="post">
                    @csrf
                    <input type="hidden" name="_csrf_token" value="470ade68671ef85d3ce392.NcOBAKc1jYmaY9F0ARgTGe75n53bdpsI9CRcjy_53hY.f4escu5Q77j2VpkMLHRef6Sv2a23W8lQt10E-16QnHJWldBCkFDH08MghA">
                    <div class="form-group">
                        <label>Tài khoản</label>
                        <input type="text" value="{{old('username')}}" name="username" class="form-control  @error('username') is-invalid @enderror" tabindex="1">
                        @error('username')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">

                                <!-- Label -->
                                <label>Mật khẩu</label>

                            </div>
                            <div class="col-auto">

                                <!-- Help text -->
                                <a href="/recover-password/request" class="form-text small text-muted">
                                    Quên mật khẩu?
                                </a>

                            </div>
                        </div> <!-- / .row -->
                        <input type="password" value="{{old('password')}}" name="password" class="form-control  @error('password') is-invalid @enderror" tabindex="2">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="remember_me" value="on">
                    <div class="clearfix">
                        <button class="btn btn-lg btn-block btn-dark mb-3 btn-submit">
                            Đăng nhập
                        </button>

                        <!-- Link -->
                        <div class="text-center mb-3">
                            <small class="text-muted">hoặc</small>
                        </div>

                        <a href="#" class="btn btn-lg btn-block btn-primary mb-3 btn-do-facebook-login" data-target-path="/login">
                            <i class="fe fe-facebook"></i> Đăng nhập bằng Facebook
                        </a>

                        <!-- Link -->
                        <div class="text-center">
                            <small class="text-muted">
                                Chưa có tài khoản? <a href="{{route('RegisterPage')}}">Đăng ký ngay</a>!
                            </small>
                        </div>

                    </div>
                </form>


            </div>
        </div> <!-- / .row -->
    </div>
@endsection
