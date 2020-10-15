<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Web
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-birthday-cake"></i>Sản
                            phẩm <span class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('danhsach-sanpham')}}">Danh sách sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('them-sanpham')}}">Thêm sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Loại Sản
                            Phẩm</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('danhsach-loai-sanpham')}}">Danh sách loại sản
                                        phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('them-loai-sanpham')}}">Thêm loại sản phẩm</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-table"></i>Hóa Đơn</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('danhsach-hoadon')}}">Danh sách hóa đơn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-fw fa-user"></i>Khách
                            Hàng</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('danhsach-khachhang')}}">Danh sách khách hàng</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        ADMINS
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-user-circle"></i> Quản lý
                            Tài Khoản </a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('danhsach-taikhoan')}}">Danh sách tài khoản</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('them-taikhoan')}}">Thêm tài khoản</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-chart-pie"></i>Thống
                            kê <span class="badge badge-secondary">New</span></a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('thongke-truycap')}}">Số lượt truy cập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('thongke-theothang')}}">Sản phẩm bán nhiều nhất
                                        trong tháng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('thongke-theoquy')}}">Sản phẩm bán nhiều nhất
                                        trong
                                        quý</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('thongke-theonam')}}">Sản phẩm bán nhiều nhất
                                        trong
                                        năm</a>
                                </li>
                            </ul>
                        </div>
                </ul>
            </div>
        </nav>
    </div>
</div>