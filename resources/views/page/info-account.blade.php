@extends('master')
@section('account_content')
    <h2>Tài Khoản</h2>
    <h5><strong>THÔNG TIN TÀI KHOẢN</strong></h5>
    <div class="content_half float_l checkout">
        Họ Tên: (*)
        <input type="text" value="{{Auth::user()->full_name}}" required style="width:300px;" readonly/>
        <br/>
        <br/>
        E-MAIL
        <input type="email" value="{{Auth::user()->email}}" readonly style="width:300px;"/>
        <br/>
        <br/>
        ĐIỆN THOẠI (*)<br/>
        <input type="text" value="{{Auth::user()->phone_number}}" style="width:300px;" readonly/>
        <br/>
        <br/>
        Địa chỉ: (*)
        <input type="text" value="{{Auth::user()->address}}" readonly style="width:300px;"/>
    </div>
    <div class="content_half float_r checkout">
        <h5><STRONG>THAO TÁC</STRONG></h5>
        <br/>
        <a href="{{route('sua-tt-taikhoan')}}">Thay đổi thông tin tài khoản</a>
        <br/>
        <br/>
        <a href="{{route('doi-matkhau')}}">Đổi mật khẩu</a>
    </div>
    <div class="cleaner h50"></div>
@endsection

