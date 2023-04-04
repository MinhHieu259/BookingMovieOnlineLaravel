@extends('layouts.user-layout')
@section('title', 'Trang mua vé')
@section('content')
    <div class="bg-dark border-bottom text-white featured-movie">
        <div class="container pt-3 pb-3">
            <div class="text-center">
                <h1 class="mb-0 title-film-ticket">
                    Người Kiến Và Chiến Binh Ong: Thế Giới Lượng Tử
                </h1>
                <p class="mb-0 text-muted desc-film-ticket">
                    Ant-Man and the Wasp: Quantumania<br/>
                    Adventure, Mystery, Fantasy, Science Fiction
                </p>
                <p class="mb-0 text-white">
                <span class="ml-2 mr-2">
                  <i class="fe fe-clock"></i>
                  124 phút
                </span>
                    <span class="ml-2 mr-2">
                  <i class="fe fe-user-check"></i>
                  NC13
                </span>
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white border-bottom sticky-movie-bars">
        <div class="container">
            <ul class="nav nav-tabs border-bottom-0">
                <li class="nav-item">
                    <a
                        href="/phim/ant-man-and-the-wasp-quantumania/"
                        class="nav-link text-center"
                    >
                        Thông tin phim
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        href="/lich-chieu/ant-man-and-the-wasp-quantumania/"
                        class="nav-link text-center"
                    >
                        Lịch chiếu
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        href="/review/ant-man-and-the-wasp-quantumania/"
                        class="nav-link text-center"
                    >
                        Đánh giá
                    </a>
                </li>
                <li class="nav-item d-none d-sm-block">
                    <a
                        href="/tin-tuc/ant-man-and-the-wasp-quantumania/1ed03939-b71d-69b6-8ed3-02d6e652ea62"
                        class="nav-link text-center"
                    >
                        Tin tức
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        href="/mua-ve/ant-man-and-the-wasp-quantumania/"
                        class="nav-link text-center active"
                    >
                        Mua vé
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-center mua-ve-tt">Mua vé trực tuyến</h2>

                <div class="card card-sm" style="width: 100%">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <select
                                    class="form-control btn-select-region select2-hidden-accessible"
                                    data-toggle="select"
                                    tabindex="-1"
                                    aria-hidden="true"
                                >
                                    <option value="1">Tp. Hồ Chí Minh</option>
                                    <option value="9" selected="">Hà Nội</option>
                                    <option value="4">Bình Dương</option>
                                    <option value="3">Đồng Nai</option>
                                    <option value="23">Lâm Đồng</option>
                                    <option value="14">Bình Định</option>
                                    <option value="7">Đà Nẵng</option>
                                    <option value="2">Bắc Giang</option>
                                    <option value="5">Đắk Lắk</option>
                                    <option value="11">Thừa Thiên - Huế</option>
                                    <option value="12">Khánh Hòa</option>
                                    <option value="24">Kiên Giang</option>
                                    <option value="52">Kon Tum</option>
                                    <option value="45">Long An</option>
                                    <option value="41">Quảng Bình</option>
                                    <option value="42">Quảng Nam</option>
                                    <option value="50">Quảng Trị</option>
                                    <option value="40">Sóc Trăng</option>
                                    <option value="22">Thái Nguyên</option>
                                    <option value="25">Thanh Hóa</option>
                                    <option value="49">Tiền Giang</option>
                                    <option value="15">Bà Rịa - Vũng Tàu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn-group btn-block mb-3" id="dates">
                    <a
                        class="btn btn-light text-muted date active btn-date-choose-in-ticket"
                        data-date="2023-03-09"
                    >
                        9/3
                        <br/><span class="small text-nowrap">Th 5</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-10"
                    >
                        10/3
                        <br/><span class="small text-nowrap">Th 6</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-11"
                    >
                        11/3
                        <br/><span class="small text-nowrap">Th 7</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-12"
                    >
                        12/3
                        <br/><span class="small text-nowrap">CN</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-13"
                    >
                        13/3
                        <br/><span class="small text-nowrap">Th 2</span>
                    </a>
                    <a
                        class="btn btn-light text-muted date btn-date-choose-in-ticket"
                        data-date="2023-03-14"
                    >
                        14/3
                        <br/><span class="small text-nowrap">Th 3</span>
                    </a>
                </div>

                <div class="alert alert-warning mb-3">
                    <i class="fe fe-info"></i> Nhấn vào suất chiếu để tiến hành mua
                    vé
                </div>

                <div id="showtimes">
                    <div class="card" style="width: 100%">
                        <div class="list-group list-group-flush">
                            <a
                                href="#"
                                class="list-group-item bg-light btn-select-cineplex sponsored-cineplex-tracking sponsored-cineplex sponsored-cineplex-18789"
                                data-toggle="collapse"
                                data-target="#collapseExample"
                                aria-expanded="false"
                                aria-controls="collapseExample"
                            >
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar avatar-sm">
                                            <img
                                                width="50"
                                                src="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/square/5fffb2fcaf3c1018282624.png"
                                                alt="Beta Cinemas"
                                                class="avatar-img rounded"
                                            />
                                        </div>
                                    </div>
                                    <div class="col ml-n2">
                                        <h4 class="text-body mb-1 name">Beta Cinemas</h4>
                                        <p class="small text-muted mb-0">4 rạp</p>
                                    </div>
                                    <div class="col-auto">
                          <span class="text-muted h3"
                          ><i class="fe fe-chevron-right"></i
                              ></span>
                                    </div>
                                </div
                                >
                            </a>

                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="width: 100%">
                                    <div
                                        class="list-group collapse show"
                                        id="showtime-cineplex-18789"
                                    >
                                        <div
                                            class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126701"
                                            data-cineplex="beta-cineplex"
                                            data-cinema="beta-cineplex-dan-phuong"
                                            data-cinema-id="126701"
                                            data-toggle="collapse"
                                            data-target="#showtime-cinema-126701"
                                            aria-expanded="true"
                                        >
                                            <h4 class="text-body mb-0 name font-weight-normal">
                                                Beta Đan Phượng
                                            </h4>
                                            <div
                                                class="cinema mt-0 collapse show"
                                                id="showtime-cinema-126701"
                                                style=""
                                            >
                                                <p class="small text-muted mb-3">
                                                    Tầng 2 Tòa nhà HHA, Khu Đô Thị XPHomes (Tân Tây
                                                    Đô), Xã Tân Lập, Huyện Đan Phượng, TP Hà Nội -
                                                    <a href="/rap/beta-cineplex-dan-phuong/"
                                                    >Thông tin rạp</a
                                                    >
                                                    -
                                                    <a
                                                        href="https://maps.google.com/?q=Beta Đan Phượng"
                                                        target="_blank"
                                                    >Bản đồ</a
                                                    >
                                                    -
                                                    <a
                                                        href="#"
                                                        data-toggle="modal"
                                                        data-target="#ticketModal"
                                                        data-name="Beta Đan Phượng"
                                                        data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219e8046e21026086857.jpg"
                                                    >Giá vé</a
                                                    >
                                                </p>
                                                <div class="showtimes loaded">
                                                    <div class="mb-1">
                                                        <label
                                                            class="small mb-2 font-weight-bold d-block text-dark"
                                                        >
                                                            2D Phụ Đề Anh
                                                        </label>
                                                        <a
                                                            href="/mua-ve/beta/126701/72849a9e-b03c-42bf-879e-b44287ea74f9"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146137"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_72849a9e-b03c-42bf-879e-b44287ea74f9"
                                                        >
                                                            <span class="time">10:45</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/6ec6698a-90b9-4a9e-aa01-ed4e0dde8af3"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146138"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_6ec6698a-90b9-4a9e-aa01-ed4e0dde8af3"
                                                        >
                                                            <span class="time">12:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/4d1558d0-4eb1-4a79-9de6-c02f0b1fa9e1"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277257519"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_4d1558d0-4eb1-4a79-9de6-c02f0b1fa9e1"
                                                        >
                                                            <span class="time">13:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/8f1c138c-4d31-455e-aff7-bc42a046cd25"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146139"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_8f1c138c-4d31-455e-aff7-bc42a046cd25"
                                                        >
                                                            <span class="time">14:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/f0401a10-1612-4ec3-a070-262135b240b6"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146140"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_f0401a10-1612-4ec3-a070-262135b240b6"
                                                        >
                                                            <span class="time">16:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/4919977e-6586-47d4-b5e2-806b4db2aae6"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146141"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_4919977e-6586-47d4-b5e2-806b4db2aae6"
                                                        >
                                                            <span class="time">18:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/9a0f606a-f5c9-49bb-8b8c-39065d763875"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146142"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_9a0f606a-f5c9-49bb-8b8c-39065d763875"
                                                        >
                                                            <span class="time">20:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/a55c06b7-2c77-4589-a562-f52e03b85c02"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277257475"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_a55c06b7-2c77-4589-a562-f52e03b85c02"
                                                        >
                                                            <span class="time">21:00</span>
                                                        </a>
                                                        <a
                                                            href="/mua-ve/beta/126701/2f3a1d5a-0d37-4d89-90a7-bb27467748c2"
                                                            data-cineplex="beta"
                                                            data-cinema="beta-cineplex-dan-phuong"
                                                            data-id="277146143"
                                                            class="btn btn-sm btn-showtime btn-outline-dark is-ticketing"
                                                            data-reference="126701_2f3a1d5a-0d37-4d89-90a7-bb27467748c2"
                                                        >
                                                            <span class="time">22:00</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126661"
                                            data-cineplex="beta-cineplex"
                                            data-cinema="beta-cineplex-my-dinh"
                                            data-cinema-id="126661"
                                            data-toggle="collapse"
                                            data-target="#showtime-cinema-126661"
                                        >
                                            <h4 class="text-body mb-0 name font-weight-normal">
                                                Beta Mỹ Đình
                                            </h4>
                                            <div
                                                class="cinema collapse mt-0"
                                                id="showtime-cinema-126661"
                                            >
                                                <p class="small text-muted mb-3">
                                                    Tầng hầm B1, tòa nhà Golden Palace, Đường Mễ
                                                    Trì, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội -
                                                    <a href="/rap/beta-cineplex-my-dinh/"
                                                    >Thông tin rạp</a
                                                    >
                                                    -
                                                    <a
                                                        href="https://maps.google.com/?q=Beta Mỹ Đình"
                                                        target="_blank"
                                                    >Bản đồ</a
                                                    >
                                                    -
                                                    <a
                                                        href="#"
                                                        data-toggle="modal"
                                                        data-target="#ticketModal"
                                                        data-name="Beta Mỹ Đình"
                                                        data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219e92a342b991516476.jpg"
                                                    >Giá vé</a
                                                    >
                                                </p>
                                                <div class="showtimes">
                                                    <div class="text-center text-muted">
                                                        <div
                                                            class="spinner-border spinner-border-sm"
                                                            role="status"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126654"
                                            data-cineplex="beta-cineplex"
                                            data-cinema="beta-cineplex-thanh-xuan"
                                            data-cinema-id="126654"
                                            data-toggle="collapse"
                                            data-target="#showtime-cinema-126654"
                                        >
                                            <h4 class="text-body mb-0 name font-weight-normal">
                                                Beta Thanh Xuân
                                            </h4>
                                            <div
                                                class="cinema collapse mt-0"
                                                id="showtime-cinema-126654"
                                            >
                                                <p class="small text-muted mb-3">
                                                    Tầng hầm B1, tòa nhà Golden West, Số 2, Lê Văn
                                                    Thiêm, Thanh Xuân, Hà Nội -
                                                    <a href="/rap/beta-cineplex-thanh-xuan/"
                                                    >Thông tin rạp</a
                                                    >
                                                    -
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
                                                        data-name="Beta Thanh Xuân"
                                                        data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219eb8df2c2163128217.jpg"
                                                    >Giá vé</a
                                                    >
                                                </p>
                                                <div class="showtimes">
                                                    <div class="text-center text-muted">
                                                        <div
                                                            class="spinner-border spinner-border-sm"
                                                            role="status"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126782"
                                            data-cineplex="beta-cineplex"
                                            data-cinema="beta-giai-phong"
                                            data-cinema-id="126782"
                                            data-toggle="collapse"
                                            data-target="#showtime-cinema-126782"
                                        >
                                            <h4 class="text-body mb-0 name font-weight-normal">
                                                Beta Giải Phóng
                                            </h4>
                                            <div
                                                class="cinema collapse mt-0"
                                                id="showtime-cinema-126782"
                                            >
                                                <p class="small text-muted mb-3">
                                                    Tầng 3, Imperial Plaza, 360 Giải Phóng, Phương
                                                    Liệt, Thanh Xuân, Hà Nội -
                                                    <a href="/rap/beta-giai-phong/"
                                                    >Thông tin rạp</a
                                                    >
                                                    -
                                                    <a
                                                        href="https://maps.google.com/?q=Beta Giải Phóng"
                                                        target="_blank"
                                                    >Bản đồ</a
                                                    >
                                                </p>
                                                <div class="showtimes">
                                                    <div class="text-center text-muted">
                                                        <div
                                                            class="spinner-border spinner-border-sm"
                                                            role="status"
                                                        ></div>
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
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
