@extends('master')
@section('contact_content')
    <h1>Liên Hệ với Chúng Tôi</h1>
    @if (Session::has('success'))
        <h4 class="btn-success">
            {{Session::get('success')}}
        </h4>
    @endif
    <div class="content_half float_l">
        <p>Hãy để lại email chính xác, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
        <div id="contact_form">
            <form method="post" action="{{route('lien-he')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <label for="author">Tên:</label> <input type="text" id="author" name="name"
                                                        class="required input_field"/>
                <div class="cleaner h10"></div>
                <label for="email">Email:</label> <input type="text" id="email" name="email"
                                                         class="validate-email required input_field"/>
                <div class="cleaner h10"></div>

                <label for="phone">Điện thoại:</label> <input type="text" name="phone" id="phone" class="input_field"/>
                <div class="cleaner h10"></div>

                <label for="text">Tin nhắn:</label> <textarea id="text" name="message_content" rows="0" cols="0"
                                                              class="required"></textarea>
                <div class="cleaner h10"></div>

                <input type="submit" class="submit_btn" id="submit" value="Gửi"/>

            </form>
        </div>
    </div>
    <div class="content_half float_r">
        <h5>Văn Phòng Chính</h5>
        22-36 Nguyễn Huệ, Bến Nghé, Quận 1, Hồ Chí Minh<br/>
        Tầng 39, phòng C7.5<br/>
        Thời gian mở cửa từ 9 đến 22 giờ<br/><br/>

        Phone: 01234567890<br/>
        Email: <a href="mailto:info@yourcompany.com">conheorung8426@gmail.com</a><br/>

        <div class="cleaner h40"></div>

        <h5>Văn Phòng Chi Nhánh</h5>
        34 Lê Duẩn, Bến Nghé, Quận 1, Hồ Chí Minh<br/>
        Tầng 25, phòng F7.1<br/>
        Thời gian mở cửa từ 9 đến 22 giờ<br/><br/>

        Phone: 01234567890<br/>
        Email: <a href="mailto:contact@yourcompany.com">congarung8426@gmail.com</a><br/>
        <br/>
    </div>

    <div class="cleaner h40"></div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.519862482281!2d106.6993558141165!3d10.771438562232795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40a3b49e59%3A0xa1bd14e483a602db!2sCao+Thang+Technical+College!5e0!3m2!1sen!2s!4v1557764106030!5m2!1sen!2s"
            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
@endsection