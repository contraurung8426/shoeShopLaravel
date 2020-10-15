<div id="templatemo_menubar">
    <div id="top_nav" class="ddsmoothmenu">
        <ul>
            <li><a href="{{route('trang-chu')}}" class="selected">Trang chủ</a></li>
            <li><a href="{{route('san-pham')}}">Sản phẩm</a>
                <ul>
                    @foreach($loaisp as $loai)
                        <li><a href="{{route('loai-sanpham',$loai->id)}}">{{$loai->name}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('gioi-thieu')}}">Về chúng tôi</a></li>
            <li><a href="{{route('dieu-khoan')}}">FAQs</a></li>
            <li><a href="{{route('dat-hang')}}">Thanh toán</a></li>
            <li><a href="{{route('lien-he')}}">Liên hệ</a></li>
        </ul>
        <br style="clear: left"/>
    </div> <!-- end of ddsmoothmenu -->
    <div id="templatemo_search">
        <form action="{{route('tim-kiem')}}" method="get">
            <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)"
                   onblur="clearText(this)" class="txt_field"/>
            <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"/>
        </form>
    </div>
</div> <!-- END of templatemo_menubar -->