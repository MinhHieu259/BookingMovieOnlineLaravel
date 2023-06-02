@extends('layouts.user-layout')
@section('title', 'Thông tin phim')
@section('content')
    <div class="bg-dark border-bottom text-white featured-movie">
        <div class="container pt-3 pb-3">
            <div class="row row-sm">
                <div class="d-none d-sm-block col-2">
                    <a href="/phim/{{ $film->slug }}" title="{{ $film->tenPhim }}">
                        <img alt="{{ $film->tenPhim }}" src="{{ asset($film->linkHinhAnh) }}"
                            class="img-fluid rounded border ls-is-cached lazyloaded" />
                    </a>
                </div>
                <div class="col-12 col-sm-10">
                    <div class="mb-3 text-center text-sm-left">
                        <h1 class="mb-0 text-truncate">
                            <a href="/phim/{{ $film->slug }}" title="{{ $film->tenPhim }}" class="title-chi-tiet-phim">
                                {{ $film->tenPhim }}
                            </a>
                        </h1>
                        <p class="mb-0 text-muted text-truncate">{{ $film->tenDanhMuc }}</p>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                 

                            <p class="mb-3 text-justify">
                                {{ $film->moTaPhim }}
                            </p>

                            <div class="row mb-3">


                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-calendar"></i>
                                        <span class="d-none d-sm-inline-block">Khởi chiếu</span> </strong><br />
                                    <span>{{ $film->ngayKhoiChieu }}</span>
                                </div>

                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-clock"></i>
                                        <span class="d-none d-sm-inline-block">Thời lượng</span> </strong><br />
                                    <span>{{ $film->thoiLuong }} phút</span>
                                </div>

                                <div class="col text-center text-sm-left">
                                    <strong>
                                        <i class="fe fe-user-check"></i>
                                        <span class="d-none d-sm-inline-block">Giới hạn tuổi</span> </strong><br />
                                    <span>{{ $film->gioiHanTuoi }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <p class="mb-2">
                                <strong> Diễn viên</strong><br />
                                <span>
                                    @foreach ($actors as $actor)
                                        <a class="text-danger" href="/nghe-sy/{{ Str::slug($actor->tenDienVien) }}"
                                            data-toggle="tooltip" title="" data-original-title="">
                                            {{ $actor->tenDienVien }}
                                        </a>
                                        @if (!$loop->last)
                                            <span class="text-white">,</span>
                                        @endif
                                    @endforeach
                                </span>
                            </p>

                            <p class="mb-2">
                                <strong> Đạo diễn</strong><br />
                                <span>
                                    @foreach ($directors as $director)
                                        <a class="text-danger" href="/nghe-sy/{{ Str::slug($director->tenDaoDien) }}"
                                            data-toggle="tooltip" title="" data-original-title="">
                                            {{ $director->tenDaoDien }}
                                        </a>
                                        @if (!$loop->last)
                                            <span class="text-white">,</span>
                                        @endif
                                    @endforeach
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white border-bottom sticky-movie-bars">
        <div class="container">
            <ul class="nav nav-tabs border-bottom-0">
                <li class="nav-item">
                    <a href="{{route('thong-tin-phim', ['slug' => $film->slug])}}" class="nav-link text-center active">
                        Thông tin phim
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('LichChieuView', ['slug' => $film->slug]) }}" class="nav-link text-center">
                        Lịch chiếu
                    </a>
                </li>

                <li class="nav-item d-none d-sm-block">
                    <a href="{{route('TinTucByFilm', ['slug' => $film->slug])}}"
                        class="nav-link text-center">
                        Tin tức
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="container mt-3">
        <div class="text-center mb-3"></div>

        <div class="row">
            <div class="col-md-8">
                <div class="js-video youtube widescreen mb-4">
                    {!! htmlspecialchars_decode($film->linkTrailer) !!}
                </div>

                <div class="card card-sm" style="width: 100%; margin-bottom: 30px;">
                    <div class="card-body">
                        <h2 class="mb-0">Lịch chiếu</h2>
                        <p class="text-muted">
                            Xem lịch chiếu cho phim
                            <strong>Siêu Lừa Gặp Siêu Lầy</strong>.
                        </p>

                        <div class="row">
                            <div class="col-6 col-sm-4">
                                <a href="{{route('LichChieuView', ['slug' => $film->slug])}}" class="btn btn-dark btn-block btn-do-select-region">Xem lịch chiếu</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="card card-sm card-article mb-3" style="width: 100%;">
                        <div class="card-header bg-light">
                            <div class="card-header-title">Bài viết liên quan</div>
                        </div>
                        <div class="card-body">
                            @forelse ( $postRelate as $post)
                                
                            <div class="article">
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <a href="{{route('DetailPost', ['slug' => $post->slug])}}" class="">
                                            <img alt="{{$post->tieuDe}}"
                                            src="{{asset($post->hinhAnh)}}"
                                                class="avatar-img rounded img-fluid ls-is-cached lazyloaded"
                                              />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h4 class="card-title mb-1 mt-2 mt-sm-0">
                                            <a href="{{route('DetailPost', ['slug' => $post->slug])}}"
                                                class="name text-dark">{{$post->tieuDe}}</a>
                                        </h4>
                                        <p class="text-muted mb-0 small">
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
                            @empty
                                <h2>Không có bài viết nào liên quan</h2>
                            @endforelse   
                  
                        
                        </div>
                    </div>
                    <a href="{{route('TinTucByFilm', ['slug' => $film->slug])}}"
                        class="btn btn-light btn-block">
                        Xem thêm tin tức về <strong>{{$film->tenPhim}}</strong>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
