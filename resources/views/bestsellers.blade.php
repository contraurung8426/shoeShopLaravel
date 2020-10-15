<div class="sidebar_box"><span class="bottom"></span>
    <h3>Sản phẩm bán chạy</h3>
    <div class="content">
        @foreach($sp as $value)
            <div class="bs_box">
                <a href="{{route('chitiet-sanpham',$value->id)}}"><img class="img_bestseller"
                                                                       src="source/images/product/{{$value->image}}"
                                                                       alt="image"/></a>
                <h4>{{$value->name}}</h4>
                @if ($value->promotion_price>0)
                    <p class="product_old_price">{{number_format($value->unit_price)}}đ</p>
                    <p class="product_new_price">{{number_format($value->promotion_price)}}đ</p>
                @else
                    <p class="product_price">{{number_format($value->unit_price)}}đ</p>
                @endif
                <div class="cleaner"></div>
            </div>
        @endforeach
    </div>
</div>