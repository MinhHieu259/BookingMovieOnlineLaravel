@extends('layouts.user-layout')
@section('title', 'Kết quả tìm kiếm từ khóa '.$q)
@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/tim-kiem.css')}}">
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
                        Theo từ khóa '{{$q}}'
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
                        @foreach($filmResults as $film)
                        <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false"
                             style="width: 143px;">
                            <div>
                                <div class="col item" style="width: 100%; display: inline-block;">
                                    <div class="mb-4">
                                        <a href="/lich-chieu/{{$film->slug}}" title="Lật Mặt 6: Tấm Vé Định Mệnh"
                                           tabindex="0">
                                            <img alt="{{$film->tenPhim}}"
                                                 src="{{asset($film->linkHinhAnh)}}"
                                                 class="img-fluid rounded mb-2 border lazyloaded"
                                                >
                                        </a>
                                        <h3 class="text-truncate h4 mb-0">
                                            <a href="/lich-chieu/{{$film->slug}}" title="{{$film->tenPhim}}"
                                               tabindex="0">
                                                {{$film->tenPhim}}
                                            </a>
                                        </h3>
                                        <p class="text-muted small mb-0">
                                            {{$film->ngayKhoiChieu}}
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

{{--    <div id="article" class="container mt-3">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-1"></div>--}}
{{--            <div class="col-md-10">--}}
{{--                <h2 class="text-center">Bài viết</h2>--}}
{{--                <div class="card card-article card-infinite mb-3" style="width: 100%">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="article">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <a href="/bai-viet/cuoc-chien-doanh-thu-ngay-07-05-lat-mat-6-can-moc-200-ty-ve-binh-mo-man-hoi-yeu/31948" class="">--}}
{{--                                        <img alt="Cuộc chiến doanh thu ngày 07.05 - Lật Mặt 6 cán mốc 200 tỷ, Vệ binh mở màn hơi yếu" src="https://moveek.com/storage/media/cache/small/6458a12dc2c05925354206.jpg" data-srcset="https://moveek.com/storage/media/cache/small/6458a12dc2c05925354206.jpg 1x, https://moveek.com/storage/media/cache/medium/6458a12dc2c05925354206.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/6458a12dc2c05925354206.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/6458a12dc2c05925354206.jpg 1x, https://moveek.com/storage/media/cache/medium/6458a12dc2c05925354206.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/cuoc-chien-doanh-thu-ngay-07-05-lat-mat-6-can-moc-200-ty-ve-binh-mo-man-hoi-yeu/31948" class="name text-dark">Cuộc chiến doanh thu ngày 07.05 - Lật Mặt 6 cán mốc 200 tỷ, Vệ binh mở màn hơi yếu</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/superheroes/" class="text-danger">Phim Siêu Anh Hùng</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-05-08 11:48:00">4 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt 6 tiếp tục thống trị phòng vé trong nước. Vệ Binh Dải Ngân Hà 3 mở màn ấn tượng nhưng không như kỳ vọng.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-6-va-con-nhot-mot-chong-2-diem-sang-cua-phim-viet-tu-dau-nam-den-nay/31915" class="">--}}
{{--                                        <img alt="Lật Mặt 6 và Con Nhót Mót Chồng - 2 điểm sáng của phim Việt từ đầu năm đến nay" src="https://moveek.com/storage/media/cache/small/644b856d5d944477887930.jpg" data-srcset="https://moveek.com/storage/media/cache/small/644b856d5d944477887930.jpg 1x, https://moveek.com/storage/media/cache/medium/644b856d5d944477887930.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/644b856d5d944477887930.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/644b856d5d944477887930.jpg 1x, https://moveek.com/storage/media/cache/medium/644b856d5d944477887930.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-6-va-con-nhot-mot-chong-2-diem-sang-cua-phim-viet-tu-dau-nam-den-nay/31915" class="name text-dark">Lật Mặt 6 và Con Nhót Mót Chồng - 2 điểm sáng của phim Việt từ đầu năm đến nay</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-30 08:00:00">12 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt 6 và Con Nhót Mót Chồng là hai cái tên sáng của nền phim ảnh Việt lúc này.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/khong-noi-dao-ly-lat-mat-6-van-phan-anh-ro-net-nhung-van-de-nhuc-nhoi-sau/31914" class="">--}}
{{--                                        <img alt="Không nói đạo lý, Lật Mặt 6 vẫn phản ánh rõ nét những vấn đề nhức nhối" src="https://moveek.com/storage/media/cache/small/644c7960c9aa9306642334.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/644c7960c9aa9306642334.jpeg 1x, https://moveek.com/storage/media/cache/medium/644c7960c9aa9306642334.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/644c7960c9aa9306642334.jpeg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/644c7960c9aa9306642334.jpeg 1x, https://moveek.com/storage/media/cache/medium/644c7960c9aa9306642334.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/khong-noi-dao-ly-lat-mat-6-van-phan-anh-ro-net-nhung-van-de-nhuc-nhoi-sau/31914" class="name text-dark">Không nói đạo lý, Lật Mặt 6 vẫn phản ánh rõ nét những vấn đề nhức nhối</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/u/miduynph" class="text-danger">--}}
{{--                                            miduynph--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-29 08:00:00">13 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Qua nhiều thước phim đặc sắc, Lật Mặt 6 lồng ghép khéo léo những mặt tối vẫn đang tồn tại trong xã hội hiện nay.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/review-lat-mat-6-tam-ve-dinh-menh/31902" class="">--}}
{{--                                        <img alt="[Review] Lật Mặt 6: Tấm Vé Định Mệnh" src="https://moveek.com/storage/media/cache/small/644691a341bad583112155.jpg" data-srcset="https://moveek.com/storage/media/cache/small/644691a341bad583112155.jpg 1x, https://moveek.com/storage/media/cache/medium/644691a341bad583112155.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/644691a341bad583112155.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/644691a341bad583112155.jpg 1x, https://moveek.com/storage/media/cache/medium/644691a341bad583112155.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/review-lat-mat-6-tam-ve-dinh-menh/31902" class="name text-dark">[Review] Lật Mặt 6: Tấm Vé Định Mệnh</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/danh-gia-phim/" class="text-danger">Đánh giá phim</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-26 14:20:00">16 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt đã tìm được phần phim hay nhất của thương hiệu - Lật Mặt 6: Tấm Vé Định Mệnh.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-6-dieu-gi-tao-nen-niem-tin-cua-khan-gia-voi-thuong-hieu-lat-mat/31873" class="">--}}
{{--                                        <img alt="Lật Mặt 6 – Điều gì tạo nên niềm tin của khán giả với thương hiệu Lật Mặt?" src="https://moveek.com/storage/media/cache/small/643fa9c4e49cf084471281.jpg" data-srcset="https://moveek.com/storage/media/cache/small/643fa9c4e49cf084471281.jpg 1x, https://moveek.com/storage/media/cache/medium/643fa9c4e49cf084471281.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/643fa9c4e49cf084471281.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/643fa9c4e49cf084471281.jpg 1x, https://moveek.com/storage/media/cache/medium/643fa9c4e49cf084471281.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-6-dieu-gi-tao-nen-niem-tin-cua-khan-gia-voi-thuong-hieu-lat-mat/31873" class="name text-dark">Lật Mặt 6 – Điều gì tạo nên niềm tin của khán giả với thương hiệu Lật Mặt?</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/u/miduynph" class="text-danger">--}}
{{--                                            miduynph--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-24 17:00:00">18 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Dù đã đi đến phần 6, nhưng loạt phim Lật Mặt vẫn là một lựa chọn mà khán giả Việt khó có thể bỏ qua tại rạp.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-xep-hang-nhung-nhan-vat-chinh-an-tuong-cua-tung-phan-phim/31868" class="">--}}
{{--                                        <img alt="Lật Mặt - Xếp hạng những nhân vật chính ấn tượng của từng phần phim" src="https://moveek.com/storage/media/cache/small/643f905b8392c748286538.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/643f905b8392c748286538.jpeg 1x, https://moveek.com/storage/media/cache/medium/643f905b8392c748286538.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/643f905b8392c748286538.jpeg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/643f905b8392c748286538.jpeg 1x, https://moveek.com/storage/media/cache/medium/643f905b8392c748286538.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-xep-hang-nhung-nhan-vat-chinh-an-tuong-cua-tung-phan-phim/31868" class="name text-dark">Lật Mặt - Xếp hạng những nhân vật chính ấn tượng của từng phần phim</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-19 17:00:00">23 ngày trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt có chất lượng tăng dần theo năm tháng, riêng chỉ những nhân vật chính của nó là đem đến sự hỗn loạn thất thường cho series điện ảnh ăn khách nhất điện ảnh Việt.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/nhung-ly-do-khong-the-bo-lo-lat-mat-6-tam-ve-dinh-menh/31690" class="">--}}
{{--                                        <img alt="Những lý do không thể bỏ lỡ Lật Mặt 6: Tấm Vé Định Mệnh" src="https://moveek.com/storage/media/cache/small/640d632f9fb0d453585931.jpg" data-srcset="https://moveek.com/storage/media/cache/small/640d632f9fb0d453585931.jpg 1x, https://moveek.com/storage/media/cache/medium/640d632f9fb0d453585931.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/640d632f9fb0d453585931.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/640d632f9fb0d453585931.jpg 1x, https://moveek.com/storage/media/cache/medium/640d632f9fb0d453585931.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/nhung-ly-do-khong-the-bo-lo-lat-mat-6-tam-ve-dinh-menh/31690" class="name text-dark">Những lý do không thể bỏ lỡ Lật Mặt 6: Tấm Vé Định Mệnh</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/susureview" class="text-danger">--}}
{{--                                            Susureview--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-04-12 08:00:00">1 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Với nhịp phim kịch tính cùng câu chuyện thú vị, Lật Mặt 6: Tấm Vé Định Mệnh được dự đoán là phần phim đáng xem nhất dịp nghỉ lễ “xả láng” này.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/ra-rap-xem-gi-thang-4-lat-mat-6-hua-hen-lam-nen-chuyen/31757" class="">--}}
{{--                                        <img alt="Ra rạp xem gì tháng 4? – Lật Mặt 6 hứa hẹn làm nên chuyện" src="https://moveek.com/storage/media/cache/small/641e940de76e5407315906.png" data-srcset="https://moveek.com/storage/media/cache/small/641e940de76e5407315906.png 1x, https://moveek.com/storage/media/cache/medium/641e940de76e5407315906.png 2x" data-src="https://moveek.com/storage/media/cache/small/641e940de76e5407315906.png" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/641e940de76e5407315906.png 1x, https://moveek.com/storage/media/cache/medium/641e940de76e5407315906.png 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/ra-rap-xem-gi-thang-4-lat-mat-6-hua-hen-lam-nen-chuyen/31757" class="name text-dark">Ra rạp xem gì tháng 4? – Lật Mặt 6 hứa hẹn làm nên chuyện</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/miduynph" class="text-danger">--}}
{{--                                            miduynph--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-03-30 08:00:00">1 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Renfield, Ngục Tối Và Rồng, Anh Em Super Mario,… đều là những tựa phim mà khán giả đang rất mong chờ.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-6-tam-ve-dinh-menh-diem-chung-cua-cac-phan-phim-lat-mat/31727" class="">--}}
{{--                                        <img alt="Lật Mặt 6: Tấm Vé Định Mệnh - Điểm chung của các phần phim Lật Mặt" src="https://moveek.com/storage/media/cache/small/64153a7b68916768055298.jpg" data-srcset="https://moveek.com/storage/media/cache/small/64153a7b68916768055298.jpg 1x, https://moveek.com/storage/media/cache/medium/64153a7b68916768055298.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/64153a7b68916768055298.jpg" class="avatar-img rounded img-fluid ls-is-cached lazyloaded" srcset="https://moveek.com/storage/media/cache/small/64153a7b68916768055298.jpg 1x, https://moveek.com/storage/media/cache/medium/64153a7b68916768055298.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-6-tam-ve-dinh-menh-diem-chung-cua-cac-phan-phim-lat-mat/31727" class="name text-dark">Lật Mặt 6: Tấm Vé Định Mệnh - Điểm chung của các phần phim Lật Mặt</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/tnathu_2511" class="text-danger">--}}
{{--                                            tnathu_2511--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-03-27 08:00:00">1 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Cùng được chỉ đạo sản xuất dưới bàn tay của Lý Hải thế nên các phần phim Lật Mặt có những nét tương đồng.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-6-ngo-ngang-cau-chuyen-chong-gai-dang-sau-qua-trinh-phuc-dung-lang-chieu-cua-e-kip/31743" class="">--}}
{{--                                        <img alt="Lật Mặt 6 - Ngỡ ngàng câu chuyện chông gai đằng sau quá trình phục dựng làng chiếu của ê kíp" src="https://moveek.com/storage/media/cache/small/641ab51e28d1e147354359.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/641ab51e28d1e147354359.jpeg 1x, https://moveek.com/storage/media/cache/medium/641ab51e28d1e147354359.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/641ab51e28d1e147354359.jpeg" class="avatar-img rounded img-fluid ls-is-cached lazyloaded" srcset="https://moveek.com/storage/media/cache/small/641ab51e28d1e147354359.jpeg 1x, https://moveek.com/storage/media/cache/medium/641ab51e28d1e147354359.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-6-ngo-ngang-cau-chuyen-chong-gai-dang-sau-qua-trinh-phuc-dung-lang-chieu-cua-e-kip/31743" class="name text-dark">Lật Mặt 6 - Ngỡ ngàng câu chuyện chông gai đằng sau quá trình phục dựng làng chiếu của ê kíp</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/anan681" class="text-danger">--}}
{{--                                            anan681--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-03-22 14:28:00">1 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lý Hải tiếp tục “chơi lớn” trong Lật Mặt 6 chi tiền tỷ để phục dựng làng chiếu Định Yên (Đồng Tháp) nhằm đem lại trải nghiệm điện ảnh đậm nét văn hóa cho công chúng.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-va-ly-hai-khong-don-gian-la-tay-ngang-lam-phim/31662" class="">--}}
{{--                                        <img alt="Lật Mặt và Lý Hải - Không đơn giản là tay ngang làm phim" src="https://moveek.com/storage/media/cache/small/6403c5c870d10196695319.jpg" data-srcset="https://moveek.com/storage/media/cache/small/6403c5c870d10196695319.jpg 1x, https://moveek.com/storage/media/cache/medium/6403c5c870d10196695319.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/6403c5c870d10196695319.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/6403c5c870d10196695319.jpg 1x, https://moveek.com/storage/media/cache/medium/6403c5c870d10196695319.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-va-ly-hai-khong-don-gian-la-tay-ngang-lam-phim/31662" class="name text-dark">Lật Mặt và Lý Hải - Không đơn giản là tay ngang làm phim</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-03-16 08:00:00">1 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt đã không thể thành công nếu không có sự nhạy bén của Lý Hải. Lịch chiếu Lật Mặt 6: Tấm Vé Định Mệnh và mua vé Lật Mặt 6: Tấm Vé Định Mệnh tại Moveek.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/can-biet-gi-ve-bo-phim-dien-anh-lat-mat-6-tam-ve-dinh-menh/31563" class="">--}}
{{--                                        <img alt="Cần biết gì về bộ phim điện ảnh Lật Mặt 6: Tấm Vé Định Mệnh?" src="https://moveek.com/storage/media/cache/small/63fdcdee21b1f137421283.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/63fdcdee21b1f137421283.jpeg 1x, https://moveek.com/storage/media/cache/medium/63fdcdee21b1f137421283.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/63fdcdee21b1f137421283.jpeg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/63fdcdee21b1f137421283.jpeg 1x, https://moveek.com/storage/media/cache/medium/63fdcdee21b1f137421283.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/can-biet-gi-ve-bo-phim-dien-anh-lat-mat-6-tam-ve-dinh-menh/31563" class="name text-dark">Cần biết gì về bộ phim điện ảnh Lật Mặt 6: Tấm Vé Định Mệnh?</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/bluejasmine711" class="text-danger">--}}
{{--                                            bluejasmine711--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-02-28 17:00:00">2 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Trở lại sau 2 năm kể từ phần phim thứ 5, Lật Mặt 6: Tấm Vé Định Mệnh dự kiến sẽ tiếp tục oanh tạc phòng vé vào dịp lễ 30.4.2023.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-va-loat-phim-tao-thanh-thuong-hieu-rieng-cua-dien-anh-viet/31595" class="">--}}
{{--                                        <img alt="Lật Mặt và loạt phim tạo thành thương hiệu riêng của điện ảnh Việt" src="https://moveek.com/storage/media/cache/small/63ee09ec0a1fe482943401.jpg" data-srcset="https://moveek.com/storage/media/cache/small/63ee09ec0a1fe482943401.jpg 1x, https://moveek.com/storage/media/cache/medium/63ee09ec0a1fe482943401.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/63ee09ec0a1fe482943401.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/63ee09ec0a1fe482943401.jpg 1x, https://moveek.com/storage/media/cache/medium/63ee09ec0a1fe482943401.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-va-loat-phim-tao-thanh-thuong-hieu-rieng-cua-dien-anh-viet/31595" class="name text-dark">Lật Mặt và loạt phim tạo thành thương hiệu riêng của điện ảnh Việt</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/bluejasmine711" class="text-danger">--}}
{{--                                            bluejasmine711--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2023-02-20 17:00:00">2 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Tuy không có quá nhiều nhưng Việt Nam cũng có một số series phim tạo thành thương hiệu riêng. Lịch chiếu Lật Mặt 6: Tấm Vé Định Mệnh và mua vé Lật Mặt 6: Tấm Vé Định Mệnh tại Moveek.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-6-buoi-casting-vo-tran-voi-hang-ngan-nguoi-tham-gia-du-tuyen/30761" class="">--}}
{{--                                        <img alt="Lật Mặt 6 - Buổi casting vỡ trận với hàng ngàn người tham gia dự tuyển" src="https://moveek.com/storage/media/cache/small/6305a3cfc7a69060141876.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/6305a3cfc7a69060141876.jpeg 1x, https://moveek.com/storage/media/cache/medium/6305a3cfc7a69060141876.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/6305a3cfc7a69060141876.jpeg" class="avatar-img rounded img-fluid ls-is-cached lazyloaded" srcset="https://moveek.com/storage/media/cache/small/6305a3cfc7a69060141876.jpeg 1x, https://moveek.com/storage/media/cache/medium/6305a3cfc7a69060141876.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-6-buoi-casting-vo-tran-voi-hang-ngan-nguoi-tham-gia-du-tuyen/30761" class="name text-dark">Lật Mặt 6 - Buổi casting vỡ trận với hàng ngàn người tham gia dự tuyển</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/anan681" class="text-danger">--}}
{{--                                            anan681--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2022-08-24 10:02:00">8 tháng trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Đây là buổi casting quy mô lớn nhất với số lượng đông đảo nhất từ trước đến nay của series Lật Mặt.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-48h-tiep-tuc-lap-nen-ky-luc-moi/29130" class="">--}}
{{--                                        <img alt="Lật Mặt: 48H - Tiếp tục lập nên kỷ lục mới cho thương hiệu" src="https://moveek.com/storage/media/cache/small/60869139d621e491011016.jpg" data-srcset="https://moveek.com/storage/media/cache/small/60869139d621e491011016.jpg 1x, https://moveek.com/storage/media/cache/medium/60869139d621e491011016.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/60869139d621e491011016.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/60869139d621e491011016.jpg 1x, https://moveek.com/storage/media/cache/medium/60869139d621e491011016.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-48h-tiep-tuc-lap-nen-ky-luc-moi/29130" class="name text-dark">Lật Mặt: 48H - Tiếp tục lập nên kỷ lục mới cho thương hiệu</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-04-26 16:50:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Chỉ sau 10 ngày khởi chiếu chính thức,&nbsp;Lật Mặt: 48H&nbsp;đã tự&nbsp;xô đổ những kỷ lục của chính mình, xác lập nên một kỷ lục mới.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/review-lat-mat-48h/29090" class="">--}}
{{--                                        <img alt="[REVIEW] Lật Mặt: 48H" src="https://moveek.com/storage/media/cache/small/6077377de7861610239547.jpg" data-srcset="https://moveek.com/storage/media/cache/small/6077377de7861610239547.jpg 1x, https://moveek.com/storage/media/cache/medium/6077377de7861610239547.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/6077377de7861610239547.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/6077377de7861610239547.jpg 1x, https://moveek.com/storage/media/cache/medium/6077377de7861610239547.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/review-lat-mat-48h/29090" class="name text-dark">[REVIEW] Lật Mặt: 48H</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/danh-gia-phim/" class="text-danger">Đánh giá phim</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/kntt" class="text-danger">--}}
{{--                                            KNTT--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-04-15 11:55:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt: 48H vẫn giữ được tinh thần cốt lõi của những phần phim trước.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-48h-2021-diem-lai-hanh-trinh-5-nam-cua-thuong-hieu-lat-mat/29072" class="">--}}
{{--                                        <img alt="Lật Mặt: 48H (2021) - Điểm lại hành trình 5 năm của thương hiệu Lật Mặt" src="https://moveek.com/storage/media/cache/small/607195528000e959718342.png" data-srcset="https://moveek.com/storage/media/cache/small/607195528000e959718342.png 1x, https://moveek.com/storage/media/cache/medium/607195528000e959718342.png 2x" data-src="https://moveek.com/storage/media/cache/small/607195528000e959718342.png" class="avatar-img rounded img-fluid ls-is-cached lazyloaded" srcset="https://moveek.com/storage/media/cache/small/607195528000e959718342.png 1x, https://moveek.com/storage/media/cache/medium/607195528000e959718342.png 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-48h-2021-diem-lai-hanh-trinh-5-nam-cua-thuong-hieu-lat-mat/29072" class="name text-dark">Lật Mặt: 48H (2021) - Điểm lại hành trình 5 năm của thương hiệu Lật Mặt</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/ivy_trat" class="text-danger">--}}
{{--                                            Ivy_Trat--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-04-11 19:00:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Điểm lại những điểm nổi bật trong hành trình 5 năm từ&nbsp;phần phim đầu đến Lật Mặt: 48h--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/lat-mat-48h-chot-ngay-khoi-chieu-moi/28963" class="">--}}
{{--                                        <img alt="Lật Mặt: 48H chốt ngày khởi chiếu mới" src="https://moveek.com/storage/media/cache/small/6040b8a32badb071363454.jpeg" data-srcset="https://moveek.com/storage/media/cache/small/6040b8a32badb071363454.jpeg 1x, https://moveek.com/storage/media/cache/medium/6040b8a32badb071363454.jpeg 2x" data-src="https://moveek.com/storage/media/cache/small/6040b8a32badb071363454.jpeg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/6040b8a32badb071363454.jpeg 1x, https://moveek.com/storage/media/cache/medium/6040b8a32badb071363454.jpeg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/lat-mat-48h-chot-ngay-khoi-chieu-moi/28963" class="name text-dark">Lật Mặt: 48H chốt ngày khởi chiếu mới</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        Moveek--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-03-04 16:33:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt: 48H sẽ ra mắt vào tháng 4.2021--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/review-lat-mat-4-nha-co-khach/26484" class="">--}}
{{--                                        <img alt="[REVIEW] Lật Mặt 4: Nhà Có Khách" src="https://moveek.com/storage/media/cache/small/5caeba8fe316f340498192.JPG" data-srcset="https://moveek.com/storage/media/cache/small/5caeba8fe316f340498192.JPG 1x, https://moveek.com/storage/media/cache/medium/5caeba8fe316f340498192.JPG 2x" data-src="https://moveek.com/storage/media/cache/small/5caeba8fe316f340498192.JPG" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/5caeba8fe316f340498192.JPG 1x, https://moveek.com/storage/media/cache/medium/5caeba8fe316f340498192.JPG 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/review-lat-mat-4-nha-co-khach/26484" class="name text-dark">[REVIEW] Lật Mặt 4: Nhà Có Khách</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/danh-gia-phim/" class="text-danger">Đánh giá phim</a>--}}
{{--                                        ·--}}
{{--                                        <a href="/u/vlynd" class="text-danger">--}}
{{--                                            VLynd--}}
{{--                                        </a>--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-02-09 18:00:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Lật Mặt 4: Nhà Có Khách hoàn toàn thành công trong việc mang lại tiếng cười cho khán giả.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                        <div class="article">--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-4 col-12">--}}
{{--                                    <a href="/bai-viet/rap-phim-dong-cua-lat-mat-48h-bo-gia-va-trang-ti-thong-bao-doi-lich-hoan-chieu/28910" class="">--}}
{{--                                        <img alt="Rạp phim TPHCM đóng cửa - Lật Mặt: 48H, Bố Già và Trạng Tí thông báo dời lịch, hoãn chiếu" src="https://moveek.com/storage/media/cache/small/60223828c01ea633364312.jpg" data-srcset="https://moveek.com/storage/media/cache/small/60223828c01ea633364312.jpg 1x, https://moveek.com/storage/media/cache/medium/60223828c01ea633364312.jpg 2x" data-src="https://moveek.com/storage/media/cache/small/60223828c01ea633364312.jpg" class="avatar-img rounded img-fluid lazyloaded" srcset="https://moveek.com/storage/media/cache/small/60223828c01ea633364312.jpg 1x, https://moveek.com/storage/media/cache/medium/60223828c01ea633364312.jpg 2x">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <h4 class="card-title mb-1 mt-2 mt-sm-0">--}}
{{--                                        <a href="/bai-viet/rap-phim-dong-cua-lat-mat-48h-bo-gia-va-trang-ti-thong-bao-doi-lich-hoan-chieu/28910" class="name text-dark">Rạp phim TPHCM đóng cửa - Lật Mặt: 48H, Bố Già và Trạng Tí thông báo dời lịch, hoãn chiếu</a>--}}
{{--                                    </h4>--}}
{{--                                    <p class="text-muted mb-0 small">--}}
{{--                                        <a href="/tin-tuc/" class="text-danger">Tin điện ảnh</a>--}}
{{--                                        ·--}}
{{--                                        Moveek--}}
{{--                                        ·--}}
{{--                                        <time datetime="2021-02-09 14:30:00">2 năm trước</time>--}}
{{--                                    </p>--}}
{{--                                    <p class="text-muted mt-2 mb-0 small d-none d-sm-block">--}}
{{--                                        Rạp phim TPHCM tạm đóng cửa, các phim Tết Việt Nam đã chính thức thông báo hoãn chiếu.--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>    </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-1"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
