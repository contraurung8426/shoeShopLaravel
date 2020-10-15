@extends('master')
@section('sign_in_content')
    <h2>Đăng nhập</h2>
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
    <h5><strong>THÔNG TIN ĐĂNG NHẬP</strong></h5>
    <form action="{{route('dang-nhap')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content_half float_l checkout">
            Email: (*)
            <input type="email" id="name" name="email" required style="width:300px;" autofocus/>
            <br/>
            <br/>
            Mật khẩu: (*)
            <input type="password" id="address" name="password" required style="width:300px;"/>
            <br/>
            <br/>
            <input type="submit" value="Đăng nhập">
            <a href="{{route('quen-matkhau')}}" style="margin-left:20px; ">Quên mật khẩu??</a>
        </div>
    </form>
    <div class="cleaner h50"></div>
@endsection
