@extends('master')
@section('producttype_content')
    <h1>{{$ten_loai_sp->name}}</h1>
    @foreach($sp_theoloai as $sp)
        <div class="product_box">
            <h3>{{$sp->name}}</h3>
            <a href="{{route('chitiet-sanpham',$sp->id)}}"><img class="img_product"
                                                                src="source/images/product/{{$sp->image}}"
                                                                alt="Shoes 1"/></a>
            @if($sp->promotion_price==0)
                <p class="product_price">{{number_format($sp->unit_price)}}đ</p>
            @else
                <p class="product_old_price">{{number_format($sp->unit_price)}}đ</p>
                <p class="product_new_price">{{number_format($sp->promotion_price)}}đ</p>
            @endif
            <div class="cleaner"></div>
            <form action="{{route('them-gio-hang')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$sp->id}}">
                <input type="number" name="qty" min="1" max="5" style="width: 30px;" required>
                <input type="submit" class="addtocart" style="font-weight: bold;color:#666666;border-radius:3px;"
                       value="Thêm vào giỏ hàng">
                {{--        <a href="{{route('them-gio-hang',$value->id)}}" class="addtocart"></a>--}}
                {{--                <a href="{{route('chitiet-sanpham',$sp->id)}}" class="detail"></a>--}}
            </form>
        </div>
    @endforeach
    <div class="cleaner"></div>
@endsection