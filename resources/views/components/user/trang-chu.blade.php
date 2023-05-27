@extends('layouts.user-layout')
@section('title', 'Trang chủ')
@push('css')

@endpush
@push('js')

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
                    @foreach($films as $index => $film)
                    <div class="item">
                        <div class="card card-carousel">
                            <a href="lich-chieu/{{$film->slug}}">
                                <img
                                    src="{{asset($film->linkHinhAnh)}}"
                                    alt="anhFilm"
                                    class="card-img-top"
                                />
                                <a href="lich-chieu/{{$film->slug}}" class="btn btn_book">Mua vé</a>
                                <div class="card-body" style="padding: 10px;">
                                    <h6 class="name-film-slide">{{$film->tenPhim}}</h6>
                                    <span class="date-show">{{$film->ngayKhoiChieu}}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="area-review">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card review-new">
                        <div class="card-header card-header-review">Mới cập nhật</div>
                        <div class="card-body">
                            @foreach ($post as $item)  
                            <div class="review-new">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img
                                        width="350"
                                            src="{{asset($item->hinhAnh)}}"
                                            alt="Anh">
                                    </div>
                                    <div class="col-md-8">
                                        <a class="name-review" href="chi-tiet-bai-viet/{{$item->maBaiViet}}">{{$item->tieuDe}}</a>
                                        <p class="name-cate-review">{{$item->maNguoiDang}} - <span
                                                class="time-post-review">{{$item->thoiGianDang}}</span></p>
                                        <p class="desc-review">{{$item->moTa}}</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
