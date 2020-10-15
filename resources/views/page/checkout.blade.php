@extends('master')
@section('checkout_content')
    <h2>Đặt Hàng</h2>
    @if(Session::has('thongbao'))
        <h4 class="btn-success">{{Session::get('thongbao')}}</h4>
    @endif
    @if(Session::has('error'))
        <h4 class="btn-danger">{{Session::get('error')}}</h4>
    @endif
    <h5><strong>THÔNG TIN HÓA ĐƠN</strong></h5>
    <form action="{{route('dat-hang')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(Auth::check())
            <div class="content_half float_l checkout">
                Họ Tên: (*)
                <input type="text" value="{{Auth::user()->full_name}}" name="name" required style="width:300px;" readonly/>
                <br/>
                <br/>
                Địa chỉ: (*)
                <input type="text" id="address" value="{{Auth::user()->address}}" name="address" readonly
                       style="width:300px;"/>
                <br/>
                <br/>
            </div>

            <div class="content_half float_r checkout">
                E-MAIL
                <input type="email" id="email" value="{{Auth::user()->email}}" name="email" required style="width:300px;" readonly/>
                <br/>
                <br/>
                ĐIỆN THOẠI (*)<br/>
                <input type="text" id="phone_number" name="phone_number" value="{{Auth::user()->phone_number}}" style="width:300px;" readonly/>
                <br/>
                <br/>
                GHI CHÚ<br/>
                <input type="text" id="note" name="note" style="width:300px;"/>
            </div>
        @else
            <div class="content_half float_l checkout">
                Họ Tên: (*)
                <input type="text" id="name" name="name" required style="width:300px;"/>
                <br/>
                <br/>
                Địa chỉ: (*)
                <input type="text" id="address" name="address" required style="width:300px;"/>
                <br/>
{{--                <br/>--}}
{{--                Giới tính:--}}
{{--                <input type="radio" value="Nam" id="gender" name="gender" checked style="width:50px;">Nam--}}

{{--                <input type="radio" value="Nữ" id="gender" name="gender" style="width:50px;">Nữ--}}
{{--                <br/>--}}
            </div>

            <div class="content_half float_r checkout">
                E-MAIL
                <input type="email" id="email" name="email" required style="width:300px;"/>
                <br/>
                <br/>
                ĐIỆN THOẠI (*)<br/>
                <span style="font-size:10px">Để lại số điện thoại, chúng tôi có thể liên lạc</span>
                <input type="text" id="phone_number" name="phone_number" style="width:300px;"/>
                <br/>
                <br/>
                GHI CHÚ<br/>
                <input type="text" id="note" name="note" style="width:300px;"/>
            </div>
        @endif
        <div class="cleaner h50"></div>
        <h3>GIỎ HÀNG</h3>
        @if (Session::has('cart'))
            <h4>TỔNG CỘNG: <strong>{{number_format((Session::get('cart')->totalPrice),0,",",".")}}đ</strong></h4>
        @else
            <h4>TỔNG CỘNG: <strong>0đ</strong></h4>
        @endif
        <p><input type="checkbox" required/>
            Tôi đã đọc kỹ những <a href="#">điều khoản</a> của website.</p>
        <table style="border:1px solid #CCCCCC;" width="100%">
            <tr>
                <td height="50px"><img src="source/images/paypal.gif" alt="paypal"/></td>
                <td width="300px;" style="padding: 0px 20px;">
                    <input type="radio" id="payment" name="payment" value="COD" checked> Thanh toán khi nhận hàng.
                </td>
                {{--            <td><a href="#" class="more">PAYPAL</a></td>--}}
            </tr>
            <tr>
                <td height="50px"><img src="source/images/2co.gif" alt="paypal"/>
                <td width="300px;" style="padding: 0px 20px;">
                    <input type="radio" id="payment" name="payment" value="ATM"> Thanh toán qua ATM.
                </td>
                <td>
                    <button type="submit" href="#">Đặt hàng</button>
                </td>
            </tr>
        </table>
    </form>
@endsection