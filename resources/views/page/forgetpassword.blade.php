@extends('master')
@section('forget_password_content')
    <h2>Quên mật khẩu</h2>
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
    <h5><strong>Nhập địa chỉ email của bạn, chúng tôi sẽ cấp mật khẩu mới</strong></h5>
    <form action="{{route('quen-matkhau')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content_half float_l checkout">
            Email: (*)
            <input type="email" id="name" name="email" required style="width:300px;"/>
            <br/>
            <br/>
            <input type="submit" value="Gửi mật khẩu"></div>
    </form>
    <div class="cleaner h50"></div>
@endsection
