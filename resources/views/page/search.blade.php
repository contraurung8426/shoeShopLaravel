@extends('master')
@section('search_content')
    <h1> Sản phẩm tìm kiếm</h1>
    @foreach($product as $value)
        <div class="product_box">
            <h3>{{$value->name}}</h3>
            <a href="{{route('chitiet-sanpham',$value->id)}}"><img class="img_product"
                                                                   src="source/images/product/{{$value->image}}"
                                                                   alt="Shoes 1"/></a>
            @if($value->promotion_price==0)
                <p class="product_price">{{number_format($value->unit_price)}}đ</p>
            @else
                <p class="product_old_price">{{number_format($value->unit_price)}}đ</p>
                <p class="product_new_price">{{number_format($value->promotion_price)}}đ</p>
            @endif
            <div class="cleaner"></div>
            <form action="{{route('them-gio-hang')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="number" name="qty" min="1" max="5" style="width: 30px;" required>
                <input type="submit" class="addtocart" value="Đặt hàng">
                {{--        <a href="{{route('them-gio-hang',$value->id)}}" class="addtocart"></a>--}}
                <a href="{{route('chitiet-sanpham',$value->id)}}" class="detail"></a>
            </form>
        </div>
    @endforeach
    <div class="cleaner"></div>
    @endsection
