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
    @if (Session::has('error'))
        <h4 class="btn-danger">
            {{Session::get('error')}}
        </h4>
    @endif
    <h5><strong>ĐỔI MẬT KHẨU</strong></h5>
    <form action="{{route('doi-matkhau')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content_half float_l checkout">
            Mật khẩu cũ: (*)
            <input type="password" name="old_password"  required style="width:300px;" autofocus/>
            <br/>
            <br/>
            Mật khẩu mới: (*)
            <input type="password" name="new_password"  style="width:300px;" required/>
            <br/>
            <br/>
            Xác nhận mật khẩu (*)<br/>
            <input type="password" name="re_new_password"  style="width:300px;" required/>
            <br/>
            <br/>
            <input type="submit" value="Đổi mật khẩu">
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
