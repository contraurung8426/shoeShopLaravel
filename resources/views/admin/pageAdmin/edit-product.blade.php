@extends('admin.master-admin')
@section('edit_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Sửa Thông Tin Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Thông Tin Sản Phẩm</li>
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
        <div class="card-body">
            <form action="{{route('sua-sanpham',$product->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Mã sản phẩm</label>
                        <input type="number" min="1" class="form-control" value="{{$product->id}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="validationCustom03"
                               placeholder="Tên sản phẩm" value="{{$product->name}}"
                               required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="input-select">Loại Sản Phẩm</label>
                        <select class="form-control" name="id_type" id="input-select">
                            @foreach($producttype as $value)
                                @if ($value->id == $product->id_type)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText9" class="col-form-label">Số lượng</label>
                        <input id="inputText9" name="qty" type="number" class="form-control" min="1" max="100"
                               placeholder="Số lượng" value="{{$product->qty}}" required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText19" class="col-form-label">Thương hiệu</label>
                        <input type="text" name="brand" value="{{$product->brand}}" class="form-control"
                               placeholder="Thương hiệu">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText4" class="col-form-label">Giá tiền</label>
                        <input id="inputText4" name="unit_price" value="{{$product->unit_price}}" type="number"
                               class="form-control" min="0"
                               placeholder="Giá tiền"
                               required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText4" class="col-form-label">Giá khuyến mãi</label>
                        <input id="inputText4" name="promotion_price" value="{{$product->promotion_price}}"
                               type="number" class="form-control" min="0"
                               placeholder="Giá khuyến mãi">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Mô tả</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                  rows="3">{{$product->description}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="file" name="image" class="custom-file-input"
                               id="customFile">
                        <label class="custom-file-label" for="customFile">Thêm hình ảnh</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <select class="form-control" name="status" id="input-select">
                            @foreach($status as $key => $tus)
                                @if ($product->status == $key)
                                    <option value="{{$key}}" selected>{{$tus}}</option>
                                @else
                                    <option value="{{$key}}">{{$tus}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
@endsection

