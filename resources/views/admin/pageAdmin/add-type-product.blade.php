@extends('admin.master-admin')
@section('add_type_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Thêm Loại Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Loại Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Loại Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="card-body">
            <form action="{{route('them-loai-sanpham')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="validationCustom03" placeholder="ví dụ: Giày tây"
                               required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Mô tả</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm loại sản phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
