@extends('admin.master-admin')
@section('add_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Thêm Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="card-body">
            <form action="{{route('them-sanpham')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" id="validationCustom03"
                               placeholder="Tên sản phẩm"
                               required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="input-select">Loại Sản Phẩm</label>
                        <select class="form-control" name="id_type" id="input-select">
                            @foreach($producttype as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText9" class="col-form-label">Số lượng</label>
                        <input id="inputText9" name="qty" type="number" class="form-control" min="1" max="100"
                               placeholder="Số lượng" required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText19" class="col-form-label">Thương hiệu</label>
                        <input type="text" name="brand" class="form-control" placeholder="Thương hiệu">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText4" class="col-form-label">Giá tiền</label>
                        <input id="inputText4" name="unit_price" type="number" class="form-control" step="50000"
                               min="0" placeholder="Giá tiền"
                               required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="inputText4" class="col-form-label">Giá khuyến mãi</label>
                        <input id="inputText4" name="promotion_price" type="number" class="form-control" min="0"
                               step="50000" placeholder="Giá khuyến mãi">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Mô tả</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Thêm hình ảnh</label>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <select class="form-control" name="status" id="input-select">
                            <option value="1">Bình thường</option>
                            <option value="2">Mới</option>
                            <option value="3">Bán chạy</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
