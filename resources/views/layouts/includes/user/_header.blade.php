<nav class="navbar navbar-expand-lg navbar-light navbar-top">
    <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01"
        aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a href="/"><img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" width="60" alt=""></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 item-navbartop">
            <li class="nav-item {{request()->is('mua-ve') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('mua-ve')}}">Mua vé</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./lich-chieu.html">Lịch chiếu</a>
            </li>
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Phim
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Rạp
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    Tin tức
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cộng đồng</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 form-search">
            <input
                class="form-control mr-sm-2 input-search"
                type="search"
                placeholder="Từ khóa tìm kiếm..."
                aria-label="Search"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Tìm kiếm
            </button>
        </form>
        <div class="area-right-nav">
            <a
                href="#"
                class="province-logo-nav"
                data-toggle="modal"
                data-target="#modelProvince"
            >
                <i class="fa-solid fa-map-location-dot"></i>
            </a>

            <a
                href="#"
                class="user-logo-nav"
                data-toggle="modal"
                data-target="#myModal"
            >
                <i class="fa-regular fa-user"></i>
            </a>
        </div>
    </div>
</nav>
