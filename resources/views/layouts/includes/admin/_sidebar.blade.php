<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.trangchu')}}" class="brand-link">
        <img src="{{asset('assets/images/user/mascot.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">@if(\Illuminate\Support\Facades\Auth::guard('admins'))<span>{{\Illuminate\Support\Facades\Auth::guard('admins')->user()->tenAdmin}}</span> @endif</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{request()->is('admin/them-moi-rap') ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is('admin/them-moi-rap') ? 'active' : ''}}">
                        <i class="fa-solid fa-masks-theater"></i>
                        <p>
                            Quản lý thông tin rạp
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.addrap')}}" class="nav-link {{request()->is('admin/them-moi-rap') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cập nhật thông tin rạp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{request()->is('admin/them-moi-cum-rap') || request()->is('admin/danh-sach-cum-rap') || Route::currentRouteName() == 'admin.editcumrap' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is('admin/them-moi-cum-rap') || request()->is('admin/danh-sach-cum-rap') || Route::currentRouteName() == 'admin.editcumrap' ? 'active' : ''}}">
                        <i class="fa-solid fa-video"></i>
                        <p>
                            Quản lý cụm rạp
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.listcumrap')}}" class="nav-link {{request()->is('admin/danh-sach-cum-rap') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách cụm rạp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.addcumrap')}}" class="nav-link {{request()->is('admin/them-moi-cum-rap') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới cụm rạp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'admin.adddoan' || Route::currentRouteName() == 'admin.listdoan' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.adddoan' || Route::currentRouteName() == 'admin.listdoan' ? 'active' : ''}}">
                        <i class="fa-solid fa-pizza-slice"></i>
                        <p>
                            Quản lý đồ ăn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.listdoan')}}" class="nav-link {{Route::currentRouteName() == 'admin.listdoan' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách đồ ăn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.adddoan')}}" class="nav-link {{Route::currentRouteName() == 'admin.adddoan' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới đồ ăn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'admin.listphong' || Route::currentRouteName() == 'admin.listphongofcum' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.listphong' || Route::currentRouteName() == 'admin.listphongofcum' ? 'active' : ''}}">
                        <i class="fa-solid fa-house-signal"></i>
                        <p>
                            Quản lý phòng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.listphong')}}" class="nav-link {{Route::currentRouteName() == 'admin.listphong' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phòng</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'admin.listdanhmuc' || Route::currentRouteName() == 'admin.adddanhmuc' || Route::currentRouteName() == 'admin.capnhatdanhmuc' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.listdanhmuc' || Route::currentRouteName() == 'admin.adddanhmuc' || Route::currentRouteName() == 'admin.capnhatdanhmuc' ? 'active' : ''}}">
                        <i class="fa-solid fa-landmark"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.listdanhmuc')}}" class="nav-link {{Route::currentRouteName() == 'admin.listdanhmuc' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.adddanhmuc')}}" class="nav-link {{Route::currentRouteName() == 'admin.adddanhmuc' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới danh mục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{Route::currentRouteName() == 'admin.addphim' || Route::currentRouteName() == 'admin.listphim' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.addphim' || Route::currentRouteName() == 'admin.listphim' ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-film"></i>
                        <p>
                            Quản lý phim
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.listphim')}}" class="nav-link {{Route::currentRouteName() == 'admin.listphim' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách phim</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.addphim')}}" class="nav-link {{Route::currentRouteName() == 'admin.addphim' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới phim</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.ManagerTicketView')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Quản lý đặt vé
                        </p>
                    </a>
                </li>

                <li class="nav-item {{Route::currentRouteName() == 'admin.ThongKeDoanhThu' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.ThongKeDoanhThu' ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-film"></i>
                        <p>
                            Thống kê
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.ThongKeDoanhThu')}}" class="nav-link {{Route::currentRouteName() == 'admin.ThongKeDoanhThu' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thống kê doanh thu</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{Route::currentRouteName() == 'admin.bai-viet.index' || Route::currentRouteName() == 'admin.bai-viet.add' || Route::currentRouteName() == 'admin.bai-viet.edit' ? 'menu-is-opening menu-open' : ''}}">
                    <a href="#" class="nav-link {{Route::currentRouteName() == 'admin.bai-viet.index' || Route::currentRouteName() == 'admin.bai-viet.add' || Route::currentRouteName() == 'admin.bai-viet.edit' ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-film"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.bai-viet.index')}}" class="nav-link {{Route::currentRouteName() == 'admin.bai-viet.index' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách bài viết</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.bai-viet.add')}}" class="nav-link {{Route::currentRouteName() == 'admin.bai-viet.add' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm mới bài viết</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-header">Đăng xuất</li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" id="logoutadmin">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
