@extends('master')
@section('product_slider')
    <div id="slider-wrapper">
        <div id="slider" class="nivoSlider">
            @foreach($slide as $value)
                <img src="source/images/slider/{{$value->image}}" alt=""/>
            @endforeach
        </div>
        <div id="htmlcaption" class="nivo-html-caption">
            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
        </div>
    </div>
    <script type="text/javascript" src="source/js//jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="source/js//jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('#slider').nivoSlider();
        });
    </script>
@endsection
@section('product_new_product')
    <h1>Sản phẩm mới</h1>
    <h4 style="color:blue;">Tìm thấy {{count($new_product)}} sản phẩm</h4>
    @foreach($new_product as $new)
        <div class="product_box">
            <h3>{{$new->name}}</h3>
            <a href="{{route('chitiet-sanpham',$new->id)}}"><img class="img_product"
                                                                 src="source/images/product/{{$new->image}}"
                                                                 alt="Shoes 2"/></a>
            @if($new->promotion_price==0)
                <p class="product_price">{{number_format($new->unit_price)}}đ</p>
            @else
                <p class="product_old_price">{{number_format($new->unit_price)}}đ</p>
                <p class="product_new_price">{{number_format($new->promotion_price)}}đ</p>
            @endif
            <div class="cleaner"></div>
            <form action="{{route('them-gio-hang')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$new->id}}">
                <input type="number" name="qty" min="1" max="5" style="width: 30px;" required>
                <input type="submit" style="font-weight: bold;color:#666666;border-radius:3px;" class="addtocart"
                       value="Thêm vào giỏ hàng">
                {{--        <a href="{{route('them-gio-hang',$value->id)}}" class="addtocart"></a>--}}
                {{--                <a href="{{route('chitiet-sanpham',$new->id)}}" class="detail"></a>--}}
            </form>
        </div>
    @endforeach
    <div class="row">{{$new_product->links()}}</div>
    <div class="cleaner"></div>
@endsection
@section('product_sale_product')
    <h1>Sản phẩm khuyến mãi</h1>
    <h4 style="color:blue;">Tìm thấy {{count($sale_product)}} sản phẩm</h4>
    @foreach($sale_product as $sale)
        <div class="product_box">
            <h3>{{$sale->name}}</h3>
            <a href="{{route('chitiet-sanpham',$sale->id)}}"><img class="img_product"
                                                                  src="source/images/product/{{$sale->image}}"
                                                                  alt="Shoes 2"/></a>
            <p class="product_old_price">{{number_format($sale->unit_price)}}đ</p>
            <p class="product_new_price">{{number_format($sale->promotion_price)}}đ</p>
            <div class="cleaner"></div>
            <form action="{{route('them-gio-hang')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$sale->id}}">
                <input type="number" name="qty" min="1" max="5" style="width: 30px;" required>
                <input type="submit" style="font-weight: bold;color:#666666;border-radius:3px;" class="addtocart"
                       value="Thêm vào giỏ hàng">
                {{--        <a href="{{route('them-gio-hang',$value->id)}}" class="addtocart"></a>--}}
                {{--                <a href="{{route('chitiet-sanpham',$sale->id)}}" class="detail"></a>--}}
            </form>
        </div>
    @endforeach
    <div class="row">{{$sale_product->links()}}</div>
    <div class="cleaner"></div>
@endsection