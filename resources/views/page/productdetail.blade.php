@extends('master')
@section('productdetail_content')
    <h1>{{$product->name}}</h1>
    <div class="content_half float_l">
        <a rel="lightbox[portfolio]" href="source/images/product/{{$product->image}}"><img
                    src="source/images/product/{{$product->image}}" alt="image"/></a>
    </div>
    <div class="content_half float_r">
        <form action="{{route('them-gio-hang')}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$product->id}}">
            <table>
                <tr>
                    <td width="160">Giá gốc:</td>
                    <td>{{$product->unit_price}}</td>
                </tr>
                <tr>
                    <td>Giá khuyến mãi:</td>
                    @if ($product->promotion_price>0)
                        <td>{{$product->promotion_price}}</td>
                    @else
                        <td>Chưa có</td>
                    @endif
                </tr>
                <tr>
                    <td>Tình trạng:</td>
                    @if ($product->qty==0)
                        <td>Hết hàng</td>
                    @else
                        <td>Còn hàng</td>
                    @endif
                </tr>
                <tr>
                    <td>Thương hiệu:</td>
                    <td>{{$product->brand}}</td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td><input type="number" name="qty" min="1" max="5" value="1"
                               style="width: 30px; text-align: right"/></td>
                </tr>
            </table>
            <div class="cleaner h20"></div>
            <button class="btn btn-primary" type="submit" style="font-weight: bold;color:#666666;border-radius:3px;">
                Thêm vào giỏ hàng
            </button>
        </form>
    </div>
    <div class="cleaner h30"></div>
    <h5>Thông tin khác về sản phẩm</h5>
    <p>{{$product->description}}</p>
    <div class="cleaner h50"></div>
@endsection
@section('related_product_content')
    <h3>Sản phẩm liên quan</h3>
    @foreach($related_product as $value)
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
        </div>
    @endforeach
@endsection
