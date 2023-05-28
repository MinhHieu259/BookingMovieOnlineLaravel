@extends('layouts.user-layout')
@section('title', 'Chi tiết bài viết')
@push('js')
    {{-- <script src="{{asset('assets/js/function/lich-chieu/chi-tiet-lich-chieu.js')}}"></script> --}}
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $('.select2').select2()
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush
@section('content')
    <div id="article" class="container mt-3">
        <div id="article-content" class="row">
            <div class="col-md-8">
                <div class="card card-article" style="width: 100%;">
                    <div class="card-body">
                        <h1 class="mb-1">{{$post->tieuDe}}</h1>

                        <p class="text-muted small">
                            ·
                            <a href="#" class="text-danger">
                                {{$post->username}}
                            </a>
                            ·
                            <time datetime="2023-03-01 19:00:00">
                                {{$post->thoiGianDang}}
                            </time>
                        </p>

                        <p class="font-weight-bold">
                            {{$post->moTa}}
                        </p>

                        <div class="post-content">
                            {!! $post->noiDung !!}
                        </div>
                        <div class="row mb-3">
                            <div class="col"><a
                                    href="{{route('thong-tin-phim', ['slug' => $film->slug])}}"
                                    class="btn btn-outline-dark btn-block">
                                    Xem thêm về {{$film->tenPhim}}
                                </a></div>
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-article" style="width: 100%">
                    <div class="card-header bg-light">
                        <div class="card-header-title">
                            Bài viết liên quan
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($postRelate as $post)
                        <div class="row">
                            <div class="col-auto"><a
                                    href="{{route('DetailPost', ['slug' => $post->slug])}}"
                                    class="avatar avatar-lg avatar-4by3"><img
                                    width="120"
                                        src="{{asset($post->hinhAnh)}}"
                                        alt="{{$post->tieuDe}}"
                                        class="avatar-img rounded"></a></div>
                            <div class="col ml-n2">
                                <h4 class="card-title mb-1"><a
                                    style="font-size: 10px"
                                        href="{{route('DetailPost', ['slug' => $post->slug])}}"
                                        class="name text-dark">{{$post->tieuDe}}</a></h4>
                                <p class="text-muted mb-0 small"><a href="#" class="text-danger">
                                        {{$post->username}}
                                    </a>
                                    ·
                                    <time datetime="{{$post->thoiGianDang}}">{{$post->thoiGianDang}}</time>
                                </p>
                            </div>
                        </div>
                      <hr>
                        @endforeach

                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
