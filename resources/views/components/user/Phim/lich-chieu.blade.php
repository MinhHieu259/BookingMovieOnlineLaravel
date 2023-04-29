@extends('layouts.user-layout')
@section('title', 'Lịch chiếu phim')
@section('content')

        <div class="bg-dark border-bottom text-white featured-movie">
            <div class="container pt-3 pb-3">
                <div class="row row-sm">
                    <div class="d-none d-sm-block col-2">
                        <a href="/phim/chuyen-xom-tui-con-nhot-mot-chong/" title="Con Nhót Mót Chồng">
                            <img alt="Con Nhót Mót Chồng"
                                 src="https://cdn.moveek.com/storage/media/cache/short/64365ab8b5fe0721283795.jpeg"
                                 data-srcset="https://cdn.moveek.com/storage/media/cache/short/64365ab8b5fe0721283795.jpeg 1x, https://cdn.moveek.com/storage/media/cache/tall/64365ab8b5fe0721283795.jpeg 2x"
                                 data-src="https://cdn.moveek.com/storage/media/cache/short/64365ab8b5fe0721283795.jpeg"
                                 class="img-fluid rounded border ls-is-cached lazyloaded"
                                 srcset="https://cdn.moveek.com/storage/media/cache/short/64365ab8b5fe0721283795.jpeg 1x, https://cdn.moveek.com/storage/media/cache/tall/64365ab8b5fe0721283795.jpeg 2x">
                        </a>
                    </div>
                    <div class="col-12 col-sm-10">
                        <div class="mb-3 text-center text-sm-left">
                            <h1 class="mb-0 text-truncate">
                                <a href="/phim/chuyen-xom-tui-con-nhot-mot-chong/" title="Con Nhót Mót Chồng">
                                    Con Nhót Mót Chồng
                                </a>
                            </h1>
                            <p class="mb-0 text-muted text-truncate">
                                - Comedy, Drama
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-7">
                                <div class="btn-block text-sm-left text-center mb-3">
                                    <a href="#" class="btn btn-light btn-sm btn-do-movie-like" data-id="16336"
                                       data-token="5c790.xBzKJJffmLlqvVmXr8n7rjw3tPijF_9gFo4XPh60Jpc.kXGDZeCr2Yg88S3U3IfK-QpT7rXteZU0QcEgbGfYVOagQ_hJzujx4FjLNg">
                                        <i class="icon-heart"></i>
                                        Thích
                                    </a>

                                    <a href="/movie/rate/16336" class="btn btn-white btn-sm btn-do-movie-rate"
                                       data-toggle="modal" data-target="#ratingModal" rel="tooltip"
                                       title="Soạn đánh giá" data-backdrop="static" data-keyboard="false">
                                        <i class="icon-star"></i>
                                        Đánh giá
                                    </a>

                                    <a href="/video/17992/" class="btn btn-outline-light btn-sm" data-toggle="modal"
                                       data-target="#videoModal" data-video-id="17992" data-video-url="zj0c2XQvN_U"
                                       data-remote="false">
                                        Trailer
                                    </a>

                                    <a href="/mua-ve/chuyen-xom-tui-con-nhot-mot-chong/" class="btn btn-danger btn-sm">
                                        Mua vé
                                    </a>
                                </div>

                                <p class="mb-3 text-justify">Review Con Nhót Mót Chồng và lịch chiếu Con Nhót Mót Chồng
                                    tại Moveek. Lấy cảm hứng từ web drama Chuyện Xóm Tui, phiên bản điện ảnh sẽ mang một
                                    màu sắc hoàn toàn khác: hài hước hơn, gần gũi và nhiều cảm xúc hơn Bộ phim là câu
                                    chuyện của Nhót - người phụ nữ “chưa kịp già” đã sắp bị mãn kinh, vội vàng đi tìm
                                    chồng. Nhưng sâu thẳm trong cô, là khao khát muốn có một đứa con và luôn muốn hàn
                                    gắn với người cha suốt ngày say xỉn của mình.</p>

                                <div class="row mb-3">
                                    <div class="col text-center text-sm-left">
                                        <strong>
                                            <i class="fe fe-thumbs-up"></i>
                                            <span class="d-none d-sm-inline-block">Hài lòng</span>
                                        </strong><br>
                                        <a href="/review/chuyen-xom-tui-con-nhot-mot-chong/" class="text-white">
                                            94%
                                        </a>
                                    </div>

                                    <div class="col text-center text-sm-left">
                                        <strong>
                                            <i class="fe fe-calendar"></i>
                                            <span class="d-none d-sm-inline-block">Khởi chiếu</span>
                                        </strong><br>
                                        <span>28/04/2023</span>
                                    </div>

                                    <div class="col text-center text-sm-left">
                                        <strong>
                                            <i class="fe fe-clock"></i>
                                            <span class="d-none d-sm-inline-block">Thời lượng</span>
                                        </strong><br>
                                        <span>112 phút</span>
                                    </div>

                                    <div class="col text-center text-sm-left">
                                        <strong>
                                            <i class="fe fe-user-check"></i>
                                            <span class="d-none d-sm-inline-block">Giới hạn tuổi</span>
                                        </strong><br>
                                        <span>NC16</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5">
                                <p class="mb-2">
                                    <strong> Diễn viên</strong><br>
                                    <span>
                                                                                                                        <a class="text-danger"
                                                                                                                           href="/nghe-sy/thai-hoa/"
                                                                                                                           data-toggle="tooltip"
                                                                                                                           title=""
                                                                                                                           data-original-title="">Thái Hoà</a>,
                                                                                                                                                                <a class="text-danger"
                                                                                                                                                                   href="/nghe-sy/thu-trang/"
                                                                                                                                                                   data-toggle="tooltip"
                                                                                                                                                                   title=""
                                                                                                                                                                   data-original-title="">Thu Trang</a>
                                                                                                            </span>
                                </p>

                                <p class="mb-2">
                                    <strong> Đạo diễn</strong><br>
                                    <span>
                                                                                                                        <a class="text-danger"
                                                                                                                           href="/nghe-sy/vu-ngoc-dang/">Vũ Ngọc Đãng</a>
                                                                                                            </span>
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
