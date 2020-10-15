@extends('admin.master-admin')
@section('edit_type_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Sửa Thông Tin Loại Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Loại Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Thông Loại Tin Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-body">
            <form action="{{route('sua-loai-sanpham',$typeproduct->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Mã Loại sản phẩm</label>
                        <input type="number" min="1" name="id" value="{{$typeproduct->id}}" class="form-control" id="validationCustom03" placeholder="Mã sản phẩm" readonly>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Tên Loại sản phẩm</label>
                        <input type="text" class="form-control" name="name" value="{{$typeproduct->name}}" id="validationCustom03" placeholder="Tên sản phẩm" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Mô tả</label>
                        <textarea class="form-control" name="note"  id="exampleFormControlTextarea1" rows="3">{{$typeproduct->note}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

