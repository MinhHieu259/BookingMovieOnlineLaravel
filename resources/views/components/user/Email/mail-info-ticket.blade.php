@extends('layouts.layout-mail')\
@section('content')
<div class="container">
    <h2 style="text-align: center">Bạn đã đặt vé thành công tại CineBooker</h2>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card bg-light mb-3" style="width: 100%">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <img width="70" src="{{asset('assets/images/user/mascot.png')}}" alt="">
                        </div>
                        <div class="col-md-10">
                            <h5>{{$dataDonHang->rap->tenRap}}</h5>
                            <h4>{{$dataDonHang->tenPhim}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Hình thức thanh toán: {{$dataDonHang->thongTinDonHang->loaiThanhToan}}</h5>
                    <span>Thời gian:</span>
                    <h5 style="color: deeppink">{{$dataDonHang->suatChieu[0]->gioChieu}}</h5>
                    <h5>{{$dataDonHang->suatChieu[0]->ngayChieu}}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-2">
                            <h6 style="color: darkgrey">Phòng: <span style="color: black">{{$dataDonHang->suatChieu[0]->tenPhong}}</span></h6>
                        </div>
                        <div class="col-2">
                            <h6 style="color: darkgrey">Số vé: <span style="color: black">{{$dataDonHang->thongTinDonHang->soVe}}</span></h6>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-5">
                            @php
                                $gheDisplayString = implode(', ', $dataDonHang->thongTinDonHang->veInfor->gheDisplay)
                            @endphp
                            <h6 style="color: darkgrey">Số ghế:  <span style="color: black">{{$gheDisplayString}}</span></h6>
                        </div>
                    </div>
                    <hr>
                    <h6 style="color: darkgrey">Rạp chiếu</h6>
                    <h4>{{$dataDonHang->rap->tenRap}}</h4>
                    <h6>Địa chỉ: {{$dataDonHang->rap->diaChi}}</h6>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

