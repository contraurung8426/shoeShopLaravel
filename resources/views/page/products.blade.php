@extends('master')
@section('products_content')
    <h1> Sản phẩm</h1>
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
                <input type="submit" class="addtocart" style="font-weight: bold;color:#666666;border-radius:3px;"
                       value="Thêm vào giỏ hàng">
                {{--        <a href="{{route('them-gio-hang',$value->id)}}" class="addtocart"></a>--}}
                {{--                <a href="{{route('chitiet-sanpham',$value->id)}}" class="detail"></a>--}}
            </form>
        </div>
    @endforeach
    <div class="row">{{$product->links()}}</div>
    <div class="cleaner"></div>
@endsection
@section('multi_search')
    <div class="sidebar_box"><span class="bottom"></span>
        <h3>Tìm theo yêu cầu</h3>
        <div class="content">
            <form action="{{route('tim-kiem')}}" method="get">
                Loại sản phẩm: (*)
                <br/>
                <select name="id_type" style="width: 150px;">
                    @foreach($typeproduct as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                <br/>
                <br/>
                Thương hiệu: (*)
                <br/>
                <select name="brand" style="width: 150px;">
                    @foreach($brand as $name)
                        <option>{{$name}}</option>
                    @endforeach
                </select>
                <br/>
                <br/>
                Giá từ: (*)
                <br/>
                <input type="number" step="10000" value="0" min="0" name="unit_price" required style="width:150px;"/>
                <br/>
                <br/>
                Khuyến mãi:
                <input type="checkbox" name="sale">
                <br/>
                <br/>
                <input type="submit" value="Tìm">
            </form>
        </div>
    </div>
@endsection