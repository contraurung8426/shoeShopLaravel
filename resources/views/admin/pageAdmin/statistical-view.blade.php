@extends('admin.master-admin')
@section('statistical_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Số lượng truy cập</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Thống Kê</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('thongke-truycap')}}">Số lượt truy cập</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <canvas id="canvas" height="200" width="450"></canvas>
    </div>
    <script>
        var qty = [{{$qty}}];
        var ctx = document.getElementById("canvas").getContext("2d");
        var BarChart = {
            labels: ["Đăng ký", "Đăng nhập", "Giỏ hàng", "Giới thiệu", "Liên hệ", "Sản phẩm", "Thanh toán", "Tìm kiếm", "Trang chủ"],
            // labels: name,
            datasets: [{
                fillColor: "rgba(192,242,42,0.91)",
                strokeColor: "rgb(241,255,64)",
                data: qty
            }]
        }
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: BarChart
            // options: {
            //     scaleFontSize: 14, scaleFontColor: "#ff8540"
            // }
        });
        // new Chart(canvas).Bar(BarChart);
    </script>
@endsection