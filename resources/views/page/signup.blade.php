@extends('master')
@section('sign_up_content')
    <h2>Đăng Ký</h2>
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
    <h5><strong>THÔNG TIN CÁ NHÂN</strong></h5>
    <form action="{{route('dang-ky')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="content_half float_l checkout">
            Họ Tên: (*)
            <input type="text" id="name" value="{{old('name')}}" name="name" required style="width:300px;"/>
            <br/>
            <br/>
            Mật khẩu: (*)
            <input type="password" id="address" name="password" required style="width:300px;"/>
            <br/>
            <br/>
            Nhập lại mật khẩu: (*)
            <input type="password" id="address" name="re_password" required style="width:300px;"/>
            <br/>
            <br/>
            <input type="submit" value="Đăng Ký">
            <br/>
        </div>

        <div class="content_half float_r checkout">
            E-MAIL
            <input type="email" id="email" name="email" required style="width:300px;"/>
            <br/>
            <br/>
            ĐIỆN THOẠI (*)<br/>
            <span style="font-size:10px">Để lại số điện thoại, chúng tôi có thể liên lạc</span>
            <input type="text" id="phone" value="{{old('phone')}}" name="phone" style="width:300px;"/>
            <br/>
            <br/>
            Địa chỉ: (*)
            <input type="text" id="address" value="{{old('address')}}" name="address" required style="width:300px;"/>
            <br/>
            <br/>
        </div>
    </form>
    <div class="cleaner h50"></div>
@endsection
