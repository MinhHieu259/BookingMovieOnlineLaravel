@extends('layouts.user-layout')
@section('title', 'Lịch chiếu')
@section('content')
    <div class="bg-white border-top border-bottom mt-3 pt-4">
        <div id="lich-chieu-background">
            <div class="container pt-4 pb-4">
                <div class="text-center">
                    <h1 class="mb-3 text-white">Lịch chiếu</h1>
                    <div class="text-white mt-0 description">
                        Tìm lịch chiếu phim / rạp nhanh nhất với chỉ 1 bước!
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card d-none d-sm-block" style="width: 100%">
                    <div class="list-group list-group-flush list">
                        <a
                            href="#"
                            class="list-group-item list-group-item-action disabled bg-light"
                        >
                            Khu vực
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region active"
                            data-region="1"
                        >
                            Tp. Hồ Chí Minh
                            <span class="badge badge-primary badge-pill">56</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="9"
                        >
                            Hà Nội
                            <span class="badge badge-primary badge-pill">43</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="7"
                        >
                            Đà Nẵng
                            <span class="badge badge-primary badge-pill">9</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="3"
                        >
                            Đồng Nai
                            <span class="badge badge-primary badge-pill">8</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="4"
                        >
                            Bình Dương
                            <span class="badge badge-primary badge-pill">8</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="15"
                        >
                            Bà Rịa - Vũng Tàu
                            <span class="badge badge-primary badge-pill">7</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="12"
                        >
                            Khánh Hòa
                            <span class="badge badge-primary badge-pill">6</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="6"
                        >
                            Cần Thơ
                            <span class="badge badge-primary badge-pill">5</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="23"
                        >
                            Lâm Đồng
                            <span class="badge badge-primary badge-pill">5</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="10"
                        >
                            Hải Phòng
                            <span class="badge badge-primary badge-pill">4</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="8"
                        >
                            Quảng Ninh
                            <span class="badge badge-primary badge-pill">4</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="11"
                        >
                            Thừa Thiên - Huế
                            <span class="badge badge-primary badge-pill">4</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="33"
                        >
                            Bắc Ninh
                            <span class="badge badge-primary badge-pill">4</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="24"
                        >
                            Kiên Giang
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="29"
                        >
                            Hải Dương
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="14"
                        >
                            Bình Định
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="5"
                        >
                            Đắk Lắk
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="21"
                        >
                            Nghệ An
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="49"
                        >
                            Tiền Giang
                            <span class="badge badge-primary badge-pill">3</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="53"
                        >
                            Bình Phước
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="18"
                        >
                            An Giang
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="2"
                        >
                            Bắc Giang
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="30"
                        >
                            Cà Mau
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="36"
                        >
                            Tây Ninh
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="22"
                        >
                            Thái Nguyên
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="25"
                        >
                            Thanh Hóa
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="40"
                        >
                            Sóc Trăng
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="41"
                        >
                            Quảng Bình
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="47"
                        >
                            Lạng Sơn
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="42"
                        >
                            Quảng Nam
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="51"
                        >
                            Quảng Ngãi
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="52"
                        >
                            Kon Tum
                            <span class="badge badge-primary badge-pill">2</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="13"
                        >
                            Bình Thuận
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="19"
                        >
                            Bến Tre
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="27"
                        >
                            Trà Vinh
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="28"
                        >
                            Vĩnh Long
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="16"
                        >
                            Ninh Bình
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="17"
                        >
                            Phú Thọ
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="35"
                        >
                            Hậu Giang
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="20"
                        >
                            Thái Bình
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="55"
                        >
                            Đồng Tháp
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="56"
                        >
                            Hưng Yên
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="31"
                        >
                            Hà Tĩnh
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="26"
                        >
                            Yên Bái
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="45"
                        >
                            Long An
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="57"
                        >
                            Hòa Bình
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="34"
                        >
                            Tuyên Quang
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="38"
                        >
                            Nam Định
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="46"
                        >
                            Sơn La
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="37"
                        >
                            Phú Yên
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="50"
                        >
                            Quảng Trị
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="48"
                        >
                            Hà Nam
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="43"
                        >
                            Ninh Thuận
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="44"
                        >
                            Gia Lai
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                        <a
                            href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center btn-choose-region"
                            data-region="54"
                        >
                            Vĩnh Phúc
                            <span class="badge badge-primary badge-pill">1</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div id="blockCinemas">
                    <div class="card d-none d-sm-block" style="width: 100%">
                        <div class="list-group list-group-flush list">
                            <div>
                                <a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/59a2a1753d6416c84b4e05146280584a33448c14.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Cinestar</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="118366"
                                >Cinestar Quốc Thanh</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126681"
                                >Cinestar Hai Bà Trưng</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/4e2f8af9e4d780495cbc387e5868c2a48c7f82c2.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Mega GS Cinemas</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="123414"
                                >Mega GS Cao Thắng</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126815"
                                >Mega GS Lý Chính Thắng</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/a1cd7de61579e7bca68c7bee4d76c4c7388478cb.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Dcine</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126763"
                                >DCINE Bến Thành</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/5fffb2fcaf3c1018282624.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Beta Cinemas</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126807"
                                >Beta Quang Trung</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/5fffb30b3194c340097683.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Galaxy Cinema</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="4"
                                >Galaxy Nguyễn Du</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="6"
                                >Galaxy Tân Bình</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="19055"
                                >Galaxy Kinh Dương Vương</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="114418"
                                >Galaxy Quang Trung</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126671"
                                >Galaxy Trung Chánh</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126692"
                                >Galaxy Phạm Văn Chí</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126694"
                                >Galaxy Huỳnh Tấn Phát</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126709"
                                >Galaxy Nguyễn Văn Quá</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126779"
                                >Galaxy Linh Trung Thủ Đức</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/524ba157cd271c9c24d15f367a57c13abc26af06.jpg"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />CGV Cinemas</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="7"
                                >CGV CT Plaza</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="8"
                                >CGV Hùng Vương Plaza</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="957"
                                >CGV Crescent Mall</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="17537"
                                >CGV Pandora City</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="113476"
                                >CGV Aeon Tân Phú</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="115783"
                                >CGV Thảo Điền Pearl</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="116692"
                                >CGV Liberty Citypoint</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="116693"
                                >CGV Vincom Thủ Đức</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="118008"
                                >CGV Vivo City</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="124433"
                                >CGV Vincom Gò Vấp</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="125374"
                                >CGV Pearl Plaza</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126638"
                                >CGV Hoàng Văn Thụ</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126639"
                                >CGV Aeon Bình Tân</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126640"
                                >CGV Vincom Đồng Khởi</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126662"
                                >CGV Saigonres Nguyễn Xí</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126704"
                                >CGV Sư Vạn Hạnh</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126735"
                                >CGV Vincom Landmark 81</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126736"
                                >CGV Satra Củ Chi</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126752"
                                >CGV Giga Mall Thủ Đức</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126774"
                                >CGV Lý Chính Thắng</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/dcc08eb55eca8002f729ae0dff98a2ae6c031db0.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />BHD Star Cineplex</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="10"
                                >BHD Star 3/2</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="17529"
                                >BHD Star Bitexco</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="113783"
                                >BHD Star Phạm Hùng</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="123269"
                                >BHD Star Quang Trung</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="125436"
                                >BHD Star Thảo Điền</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126634"
                                >BHD Star Lê Văn Việt</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/38fee9d0c0a533a3d4fb4779d4efa8842a6d5bae.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Lotte Cinema</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="151"
                                >Lotte Nam Sài Gòn</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="18992"
                                >Lotte Cộng Hoà</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="113311"
                                >Lotte Cantavil</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="114077"
                                >Lotte Phú Thọ</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126636"
                                >Lotte Nowzone</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126641"
                                >Lotte Gò Vấp</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126657"
                                >Lotte Thủ Đức</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126748"
                                >Lotte Ung Văn Khiêm</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126749"
                                >Lotte Gold View</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126785"
                                >Lotte Moonlight Thủ Đức</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/6397446bee6da982816422.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Đống Đa Cinema</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="154"
                                >Đống Đa Cinema</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action disabled bg-light"
                                ><img
                                        src="https://moveek.com/bundles/ornweb/img/no-thumbnail.png"
                                        alt=""
                                        class="rounded-circle float-left mr-3"
                                        width="24"
                                    />Viện Trao Đổi Văn Hóa Pháp</a
                                ><a
                                    href="#"
                                    class="list-group-item list-group-item-action text-truncate btn-choose-cinema"
                                    data-cinema="126808"
                                >Viện Trao đổi Văn Hóa Pháp - IDECAF</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="showtimes">
                    <div class="showtimes">
                        <div
                            class="btn-group btn-block showtime-dates mb-3"
                            id="dates"
                        >
                            <a
                                class="btn btn-light text-muted date active btn-date-choose"
                                data-date="2023-03-07"
                            >
                                7/3
                                <br /><span class="small text-nowrap">Th 3</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date btn-date-choose"
                                data-date="2023-03-08"
                            >
                                8/3
                                <br /><span class="small text-nowrap">Th 4</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date btn-date-choose"
                                data-date="2023-03-09"
                            >
                                9/3
                                <br /><span class="small text-nowrap">Th 5</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date btn-date-choose"
                                data-date="2023-03-10"
                            >
                                10/3
                                <br /><span class="small text-nowrap">Th 6</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date btn-date-choose"
                                data-date="2023-03-11"
                            >
                                11/3
                                <br /><span class="small text-nowrap">Th 7</span>
                            </a>
                            <a
                                class="btn btn-light text-muted date btn-date-choose"
                                data-date="2023-03-12"
                            >
                                12/3
                                <br /><span class="small text-nowrap">CN</span>
                            </a>
                        </div>

                        <div class="alert alert-warning mb-3">
                            <i class="fe fe-info"></i> Nhấn vào suất chiếu để tiến hành
                            mua vé
                        </div>

                        <div class="alert alert-light border mb-3">
                            <p class="mb-0">
                                <a href="/rap/beta-cineplex-thanh-xuan/" class="text-dark"
                                >Beta Thanh Xuân</a
                                >
                                · <span class="text-muted">Thứ Ba, 07/03/2023</span>
                            </p>
                            <p class="small mb-0 text-muted">
                                Tầng hầm B1, tòa nhà Golden West, Số 2, Lê Văn Thiêm,
                                Thanh Xuân, Hà Nội -
                                <a
                                    href="https://maps.google.com/?q=Beta Thanh Xuân"
                                    target="_blank"
                                >Bản đồ</a
                                >
                                -
                                <a
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#ticketModal"
                                    data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219eb8df2c2163128217.jpg"
                                >Giá vé</a
                                >
                            </p>
                        </div>

                        <div
                            class="card card-sm mb-3"
                            data-movie="sieu-lua-gap-sieu-lay"
                            data-movie-id="16293"
                            style="width:100%;"
                        >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <a href="/phim/sieu-lua-gap-sieu-lay/">
                                            <img
                                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/mini/63e78adaa7634025342084.png"
                                                alt="Siêu Lừa Gặp Siêu Lầy"
                                                class="rounded img-fluid"
                                            />
                                        </a>
                                    </div>
                                    <div class="col ml-n2">
                                        <h4 class="card-title mb-1 name">
                                            <a href="/phim/sieu-lua-gap-sieu-lay/">
                                                Siêu Lừa Gặp Siêu Lầy
                                            </a>
                                        </h4>

                                        <p class="card-text small text-muted mb-0">
                                            NC16 · 2h15' ·
                                            <a
                                                href="/video/17897/"
                                                data-toggle="modal"
                                                data-target="#videoModal"
                                                data-video-id="17897"
                                                data-video-url="UQi44Yoef98"
                                                data-remote="false"
                                            >Trailer</a
                                            >
                                        </p>

                                        <div class="mt-2">
                                            <div class="mb-1">
                                                <label
                                                    class="small mb-2 font-weight-bold d-block text-dark"
                                                >
                                                    2D Phụ Đề Anh
                                                </label>
                                                <a
                                                    href="/mua-ve/beta/126654/6d28f32f-ef9b-442c-bbda-12afaa05982d"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187114"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_6d28f32f-ef9b-442c-bbda-12afaa05982d"
                                                >
                                                    <span class="time">09:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/a30a861e-345c-4414-99cb-22d97ca63c00"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187115"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_a30a861e-345c-4414-99cb-22d97ca63c00"
                                                >
                                                    <span class="time">10:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/d80c0a95-3cce-43e5-b267-4b5a38dfaffe"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187116"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_d80c0a95-3cce-43e5-b267-4b5a38dfaffe"
                                                >
                                                    <span class="time">11:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/7d05a295-f03e-47b6-a60b-6b9ee2738e4f"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187117"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_7d05a295-f03e-47b6-a60b-6b9ee2738e4f"
                                                >
                                                    <span class="time">12:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/9112390f-58dd-4e19-8b2e-0a5a8cbbb09f"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187118"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_9112390f-58dd-4e19-8b2e-0a5a8cbbb09f"
                                                >
                                                    <span class="time">13:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/1eb87e66-1493-4960-9530-759ed2434d29"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187119"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_1eb87e66-1493-4960-9530-759ed2434d29"
                                                >
                                                    <span class="time">14:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/2dd346d9-4aba-4d76-aa07-ebe3c64e5175"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187120"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_2dd346d9-4aba-4d76-aa07-ebe3c64e5175"
                                                >
                                                    <span class="time">15:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/24a94454-cf78-4a49-abf3-a712ae973f56"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187121"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_24a94454-cf78-4a49-abf3-a712ae973f56"
                                                >
                                                    <span class="time">16:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/162ada1a-a34c-4def-8351-1ae5d60d3993"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187122"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_162ada1a-a34c-4def-8351-1ae5d60d3993"
                                                >
                                                    <span class="time">17:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/3d3412a2-9ebb-4515-b3c6-141b58dffed2"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187123"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_3d3412a2-9ebb-4515-b3c6-141b58dffed2"
                                                >
                                                    <span class="time">18:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/93f49576-935c-4e57-b2d8-b9f32dc53bff"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187124"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_93f49576-935c-4e57-b2d8-b9f32dc53bff"
                                                >
                                                    <span class="time">19:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/c868a307-38f8-4255-b47d-a35305e849ee"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277185807"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_c868a307-38f8-4255-b47d-a35305e849ee"
                                                >
                                                    <span class="time">20:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/5f33efc7-9b34-4023-99b9-50436d457b14"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187125"
                                                    class="btn btn-sm btn-showtime disabled btn-light is-ticketing"
                                                    data-reference="126654_5f33efc7-9b34-4023-99b9-50436d457b14"
                                                >
                                                    <span class="time">21:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/c4dc479a-29ef-4bc5-9c76-9199a7f97402"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187126"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126654_c4dc479a-29ef-4bc5-9c76-9199a7f97402"
                                                >
                                                    <span class="time">22:00</span>
                                                </a>
                                                <a
                                                    href="/mua-ve/beta/126654/777bd0b2-a9fb-4a09-ba4f-2144bdda42aa"
                                                    data-cineplex="beta"
                                                    data-cinema="beta-cineplex-thanh-xuan"
                                                    data-id="277187127"
                                                    class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                    data-reference="126654_777bd0b2-a9fb-4a09-ba4f-2144bdda42aa"
                                                >
                                                    <span class="time">23:00</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
