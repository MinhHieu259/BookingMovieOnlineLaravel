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

                <form name="fos_user_registration_form" method="post" action="/register/"
                      class="fos_user_registration_register">

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group"><label for="fos_user_registration_form_email" class="required">Email:</label><input
                                    type="email" id="fos_user_registration_form_email"
                                    name="fos_user_registration_form[email]" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group"><label for="fos_user_registration_form_username" class="required">Tên
                                    đăng nhập:</label><input type="text" id="fos_user_registration_form_username"
                                                             name="fos_user_registration_form[username]"
                                                             required="required" maxlength="32"
                                                             pattern="[a-zA-z0-9\_.]+" class="form-control"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group"><label for="fos_user_registration_form_plainPassword_first"
                                                           class="required">Mật khẩu:</label><input type="password"
                                                                                                    id="fos_user_registration_form_plainPassword_first"
                                                                                                    name="fos_user_registration_form[plainPassword][first]"
                                                                                                    required="required"
                                                                                                    autocomplete="new-password"
                                                                                                    class="form-control"
                                                                                                    aria-autocomplete="list">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group"><label for="fos_user_registration_form_plainPassword_second"
                                                           class="required">Xác nhận mật khẩu:</label><input type="password"
                                                                                                    id="fos_user_registration_form_plainPassword_second"
                                                                                                    name="fos_user_registration_form[plainPassword][second]"
                                                                                                    required="required"
                                                                                                    autocomplete="new-password"
                                                                                                    class="form-control">
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
