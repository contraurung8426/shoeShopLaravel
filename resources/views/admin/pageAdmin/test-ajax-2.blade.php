@foreach($comment as $value)
    <div class="comment-content" style="border: 1px solid #725810;margin:20px 0 20px 0;">
        <p>Tên: Nguyễn Ngọc Thành</p>
        <p>Nội dung bình luận: {{$value->content}}</p>
        <p>{{$value->date}}</p>
    </div>
@endforeach