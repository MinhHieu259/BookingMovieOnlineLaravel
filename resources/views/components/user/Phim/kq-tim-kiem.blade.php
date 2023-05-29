@extends('layouts.user-layout')
@section('title', 'Kết quả tìm kiếm từ khóa ' . $q)
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/tim-kiem.css') }}">
@endpush
@section('content')
    <div class="bg-white border-top border-bottom pt-4">
        <div id="lich-chieu-background">
            <div class="container pt-4 pb-4">
                <div class="text-center">
                    <h1 class="mb-3 text-white">
                        Tìm kiếm
                    </h1>
                    <div class="text-white mt-0 description">
                        Theo từ khóa '{{ $q }}'
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">

        <h2 class="text-center">Phim</h2>

        <div class="row grid slick-grid slick-initialized slick-slider">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
                        @foreach ($filmResults as $film)
                            <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                                style="width: 143px;">
                                <div>
                                    <div class="col item" style="width: 100%; display: inline-block;">
                                        <div class="mb-4">
                                            <a href="/lich-chieu/{{ $film->slug }}" title="Lật Mặt 6: Tấm Vé Định Mệnh"
                                                tabindex="0">
                                                <img alt="{{ $film->tenPhim }}" src="{{ asset($film->linkHinhAnh) }}"
                                                    class="img-fluid rounded mb-2 border lazyloaded">
                                            </a>
                                            <h3 class="text-truncate h4 mb-0">
                                                <a href="/lich-chieu/{{ $film->slug }}" title="{{ $film->tenPhim }}"
                                                    tabindex="0">
                                                    {{ $film->tenPhim }}
                                                </a>
                                            </h3>
                                            <p class="text-muted small mb-0">
                                                {{ $film->ngayKhoiChieu }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <div id="article" class="container mt-3">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2 class="text-center">Bài viết</h2>
                <div class="card card-article card-infinite mb-3" style="width: 100%">
                    <div class="card-body">
                        @foreach ($postResults as $post)
                        <div class="article">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('DetailPost', ['slug' => $post->postSlug])}}"
                                        class="">
                                        <img alt="{{$post->tieuDe}}"
                                            src="{{asset($post->hinhAnh)}}"
                                            width="200"
                                           >
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">
                                        <a href="{{route('DetailPost', ['slug' => $post->postSlug])}}"
                                            class="name text-dark">{{$post->tieuDe}}</a>
                                    </h4>
                                    <p class="text-muted mb-0 small">
                                        <a href="#" class="text-danger">{{$post->tenDanhMuc}}</a>
                                        ·
                                        <a href="#" class="text-danger">
                                            {{$post->username}}
                                        </a>
                                        ·
                                        <time datetime="{{$post->thoiGianDang}}">{{$post->thoiGianDang}}</time>
                                    </p>
                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">
                                        {{$post->moTa}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    </div>
@endsection
