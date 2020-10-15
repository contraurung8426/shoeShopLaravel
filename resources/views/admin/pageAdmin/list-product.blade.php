@extends('admin.master-admin')
@section('multi_search')
    <form action="{{route('danhsach-sanpham')}}" method="get">
        <div class="card mb-2">
            <div class="card-header" id="headingNine">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine"
                            aria-expanded="false" aria-controls="collapseNine">
                        <span class="fas mr-3 fa-angle-down"></span>Lọc
                    </button>
                </h5>
            </div>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3" style="">
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Số lượng</label>
                        <input type="number" name="qty" min="0" step="5" class="form-control" placeholder="Số lượng"
                               required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="input-select">Loại Sản Phẩm</label>
                        <select class="form-control" name="id_type" id="input-select">
                            @foreach($typeproduct as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom04">Giá từ</label>
                        <input type="number" name="unit_price" min="0" step="10000" class="form-control"
                               id="validationCustom04" placeholder="Giá" required>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Lọc</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('list_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('danhsach-sanpham')}}">Danh Sách Sản Phẩm</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        @include('admin.message')
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                <tr class="border-0">
                    <th class="border-0">#</th>
                    <th class="border-0">Thao tác</th>
                    <th class="border-0">Hình ảnh</th>
                    <th class="border-0">Loại sản phẩm</th>
                    <th class="border-0">Tên sản phẩm</th>
                    <th class="border-0">Số lượng</th>
                    <th class="border-0">Đơn giá</th>
                    <th class="border-0">Giá khuyến mãi</th>
                    <th class="border-0">Thương hiệu</th>
                    <th class="border-0">Mô tả</th>
                    <th class="border-0">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>
                            <p><a href="{{route('xoa-sanpham',$value->id)}}">Xóa</a></p>
                            <p><a href="{{route('sua-sanpham',$value->id)}}">Sửa</a></p>
                        </td>
                        <td>
                            <div class="m-r-10"><img src="source/images/product/{{$value->image}}" alt="user"
                                                     class="rounded"
                                                     width="80" height="60"></div>
                        </td>
                        <td>
                            @foreach($typeproduct as $type)
                                @if ($value->id_type == $type->id)
                                    {{$type->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{$value->unit_price}}</td>
                        <td>{{$value->promotion_price}}</td>
                        <td>{{$value->brand}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$status[$value->status]}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (isset($paginate))
        <div class="row">
            {{$product->links()}}
        </div>
    @endif
@endsection