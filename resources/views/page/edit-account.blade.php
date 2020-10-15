@extends('master')
@section('account_content')
    <h2>Tài Khoản</h2>
    @if (count($errors)>0)
        <h4 class="btn-danger">
            @foreach($errors->all() as $err)
                {{$err}}
            @endforeach
        </h4>
    @endif
    @if (Session::has('success'))
        <h4 class="btn-success">
            {{Session::get('success')}}
        </h4>
    @endif
    <h5><strong>THÔNG TIN TÀI KHOẢN</strong></h5>
    <form action="{{route('sua-tt-taikhoan')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content_half float_l checkout">
            Họ Tên: (*)
            <input type="text" value="{{Auth::user()->full_name}}" name="name" required style="width:300px;" readonly/>
            <br/>
            <br/>
            ĐIỆN THOẠI (*)<br/>
            <input type="text" value="{{Auth::user()->phone_number}}" name="phone_number" style="width:300px;" required/>
            <br/>
            <br/>
            Địa chỉ: (*)
            <input type="text" value="{{Auth::user()->address}}" name="address" required style="width:300px;"/>
            <br/>
            <br/>
            <input type="submit" value="Lưu">
        </div>
    </form>
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
