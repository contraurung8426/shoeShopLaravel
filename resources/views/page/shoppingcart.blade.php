@extends('master')
@section('shoppingcart_content')
    <h1>Giỏ Hàng</h1>
    <table width="680px" cellspacing="0" cellpadding="5">
        <tr bgcolor="#ddd">
            <th width="220" align="left">Hình ảnh</th>
            <th width="180" align="left">Tên sản phẩm</th>
            <th width="100" align="center">Số lượng</th>
            <th width="60" align="right">Đơn giá</th>
            <th width="60" align="right">Tổng</th>
            <th width="90">Thao tác</th>
        </tr>
        @if (Session::has('cart'))
            {{--            {{dd(Session::get('cart')->items)}}--}}
            {{--        {{dd($product_cart)}}--}}
            @foreach($product_cart as $product)
                <tr>
                    <form action="{{route('capnhat-gio-hang',$product['item']['id'])}}" method="get">
                        <td><img class="img_product" src="source/images/product/{{$product['item']['image']}}"
                                 alt="image 1"/></td>
                        <td>{{$product['item']['name']}}
                        </td>
                        <td align="center"><input type="number" name="qty" min="0" max="5" value="{{$product['qty']}}"
                                                  style="width: 30px; text-align: right"/></td>
                        @if ($product['item']['promotion_price']>0)
                            <td align="right">{{number_format($product['item']['promotion_price'])}}</td>
                            <td align="right">{{number_format($product['qty']*$product['item']['promotion_price'])}}</td>
                        @else
                            <td align="right">{{number_format($product['item']['unit_price'])}}</td>
                            <td align="right">{{number_format($product['qty']*$product['item']['unit_price'])}}</td>
                        @endif
                        <td align="center">
                            <img src="source/images/update_icon.png" alt="update"
                                 style="width: 28px;height: 28px;"/>
                            <button type="submit" href="#"
                                    style="border: none;background-color: transparent;color: #0299aa;">Cập nhật
                            </button>
                            <a href="{{route('xoa-gio-hang',$product['item']['id'])}}"><img
                                        src="source/images/remove_x.gif" alt="remove"/><br/>Xóa</a>
                        </td>
                    </form>
                </tr>
            @endforeach
        @endif
        <tr>
            <td colspan="3" align="right" height="30px">
            </td>
            <td colspan="1" align="right" style="background:#ddd; font-weight:bold"> T.Cộng</td>
            @if (Session::has('cart'))
                <td align="right"
                    style="background:#ddd; font-weight:bold">{{number_format((Session('cart')->totalPrice),0,",",".")}}
                    đ
                </td>
            @else
                <td align="right" style="background:#ddd; font-weight:bold">0đ</td>
            @endif
            <td style="background:#ddd; font-weight:bold"></td>
        </tr>
    </table>
    <div style="float:right; width: 215px; margin-top: 20px;">
        <p><a href="{{route('dat-hang')}}">Tiến hành thanh toán</a></p>
        <p><a href="javascript:history.back()">Tiếp tục mua hàng</a></p>
    </div>
@endsection
