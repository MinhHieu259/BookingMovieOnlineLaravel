@extends('layouts.user-layout')
@section('title', 'Chi tiết rạp ' . $chiTietRap->tenRap)
@push('js')
    <script src="{{ asset('assets/js/function/rap/chi-tiet-rap.js') }}"></script>
@endpush
@section('content')
    <div class="bg-light border-bottom">
        <input type="hidden" value="{{ $chiTietRap->maChiTietRap }}" id="maChiTietRap">
        <div class="container pt-3 pb-3">
            <div class="row row-sm">
                <div class="d-none d-sm-block col-1">
                    <img src="{{ asset($imageTheater) }}" class="img-fluid rounded-circle border p-1 bg-white" />
                </div>
                <div class="col-12 col-sm-11">
                    <div class="mb-3">
                        <h1 class="mb-0" style="font-size: 1.625rem">
                            {{ $chiTietRap->tenRap }}
                        </h1>
                        <p class="mb-0 small text-muted text-truncate">
                            {{ $chiTietRap->diaChi }}
                        </p>
                        <div class="mb-0 small">
                            <a href="{{ $chiTietRap->map }}" target="_blank" class="text-muted flex-">
                                <i class="fe fe-map-pin"></i>
                                Bản đồ
                            </a>

                            <a href="/rap-khu-vuc/ha-noi/" class="text-muted ml-3 d-none d-sm-inline-block">
                                <i class="fe fe-globe"></i>
                                {{ $chiTietRap->tenTinh }}
                            </a>
                        </div>
                    </div>

                    <p class="mb-0">
                        {{ $chiTietRap->moTa }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="text-center mb-3"></div>

        <div class="row">
            <div class="col-md-8">
                <div id="showtimes">
                    <div class="showtimes">
                        <div class="btn-group btn-block showtime-dates mb-3" id="dates">
                            @foreach ($dates as $index => $date)
                                <a class="btn {{ $index == 0 ? 'active' : '' }} btn-light text-muted date btn-date-choose-theater"
                                    data-date="{{ $date[1] }}" style="width: 105px">
                                    {{ $date[0] }}
                                    <br /><span class="small text-nowrap"> {{ $date[2] }}</span>
                                </a>
                            @endforeach
                        </div>

                        <div class="alert alert-warning mb-3">
                            <i class="fe fe-info"></i> Nhấn vào suất chiếu để tiến hành
                            mua vé
                        </div>

                        <div id="area-list-films">
                        
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
