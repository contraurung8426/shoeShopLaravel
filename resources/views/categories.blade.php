<div class="sidebar_box"><span class="bottom"></span>
    <h3>Danh mục</h3>
    <div class="content">
        <ul class="sidebar_list">
            @foreach($danhmuc as $value)
                <li><a href="{{route('loai-sanpham',$value->id)}}">{{$value->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>