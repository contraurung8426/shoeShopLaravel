<div id="templatemo_header">
    <div id="site_title"><h1><a href="{{route('trang-chu')}}">Online Shoes Store</a></h1></div>
    <div id="header_right">
        <p>
            <a href="{{route('lien-he')}}">Liên Hệ</a> |
            <a href="{{route('gio-hang')}}">Giỏ Hàng</a> |
            @if (Auth::check())
                <a href="{{route('tt-taikhoan')}}">Tài Khoản</a> |
                <strong style="font-size: 15px;">{{Auth::user()->full_name}} </strong><a href="{{route('dang-xuat')}}">(Đăng
                    Xuất)</a>
            @else
                <a href="{{route('dang-ky')}}">Đăng Ký</a>|
                <a href="{{route('dang-nhap')}}">Đăng Nhập</a>
            @endif
        </p>
        @if (Session::has('cart'))
            <p>Giỏ hàng: <strong>{{Session::get('cart')->totalQty}} sản phẩm</strong> ( <a
                        href="{{route('gio-hang')}}">Hiển thị</a> )</p>
        @else
            <p>Giỏ hàng: <strong>Chưa có sản phẩm nào</strong></p>
        @endif
    </div>
    <div class="cleaner"></div>
</div> <!-- END of templatemo_header -->