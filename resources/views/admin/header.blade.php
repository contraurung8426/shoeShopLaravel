<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{route('danhsach-sanpham')}}">Trang Quản Trị</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <form method="get" action="{{route('danhsach-sanpham')}}">
                    <div class="form-group row">
                        <div class="col-sm-4 col-lg-4 mb-3 mb-sm-0">
                            <input size="100px" name="keyword" type="text" required
                                   placeholder="Nhập tên hoặc mã sản phẩm" class="form-control">
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <input type="submit" class="form-control" value="Tìm kiếm">
                        </div>
                    </div>
                </form>
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-bell"></i>
                        @if (isset($notice[0]))
                            <span class="indicator"></span>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Thông báo</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    @foreach($notice as $value)
                                        <a href="{{route('gui-matkhau',$value->id_user)}}"
                                           class="list-group-item list-group-item-action active">
                                            <div class="notification-info">

                                                <div class="notification-list-user-block">
                                                    <span class="notification-list-user-name">{{$value->description}}</span>
                                                    <div> Gửi mật khẩu</div>
                                                </div>

                                            </div>
                                        </a>
                                </div>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <div class="list-footer"><a href="#">View all notifications</a></div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"><img
                                src="source/concept-master/assets/images/avatar-1.jpg" alt=""
                                class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                         aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">{{Auth::user()->full_name}}</h5>
                            <span class="status"></span><span class="ml-2"><span
                                        class="badge-dot badge-brand mr-1"></span>Đang hoạt động</span>
                        </div>
                        <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Tài khoản</a>
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->f
                        <a class="dropdown-item" href="{{route('dang-xuat')}}"><i class="fas fa-power-off mr-2"></i>Đăng
                            xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>