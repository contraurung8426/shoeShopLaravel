@extends ('admin.master-admin')
@section('test_ajax_content')
    {{--    <p>Ajax 1</p>--}}
    {{--    <button id="btn-profile">Nhấp vào đây để xem thông tin cá nhân</button>--}}
    {{--    <script>--}}
    {{--        var button = document.getElementById("btn-profile");--}}
    {{--        button.onclick = function () {--}}
    {{--            $.get("{{route('ajax2')}}", {ten: "Le Van Tan", tuoi: 20}, function (data) {--}}
    {{--                $("#profile").html(data);--}}
    {{--            });--}}
    {{--        };--}}
    {{--        $.get("{{route('hello')}}", function (data) {--}}
    {{--            $("#hello").html(data);--}}
    {{--        })--}}
    {{--    </script>--}}
    {{--    <div id="profile"></div>--}}
    {{--    <div id="hello"></div>--}}
    <div id="list-comment">
    @foreach($comment as $value)
        <div class="comment-content" style="border: 1px solid #725810;margin:20px 0 20px 0;">
            <p>Tên: Nguyễn Ngọc Thành</p>
            <p>Nội dung bình luận: {{$value->content}}</p>
            <p>{{$value->date}}</p>
        </div>
    @endforeach
    </div>
    <input id="comment" name="comment" type="text" placeholder="Nhập nội dung bình luận"><br/><br/>
    <input id="btn-result" type="button" value="Bình luận">
    <script>
        $(document).ready(function () {
            $("#btn-result").click(function () {
                var content = $("#comment").val();
                $.get("{{route('ajax2')}}", {comment_content:content}, function (data) {
                    $("#list-comment").html(data);
                });
            });
        });
    </script>
    {{--    <div class="col-lg-12">--}}
    {{--        @if (Session::has('error'))--}}
    {{--            <div class="alert alert-danger">--}}
    {{--                {{Session::get('error')}}--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--        @if (Session::has('success'))--}}
    {{--            <div class="alert alert-success">--}}
    {{--                {{Session::get('success')}}--}}
    {{--            </div>--}}
    {{--        @endif--}}
    {{--    </div>--}}
@endsection
