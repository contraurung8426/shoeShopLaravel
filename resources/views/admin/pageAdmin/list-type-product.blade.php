@extends('admin.master-admin')
@section('list_type_product_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Loại Sản Phẩm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Loại Sản Phẩm</li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Sách Loại Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Loại Sản Phẩm</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thao tác</th>
                            <th scope="col">Tên Loại Sản Phẩm</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($typeproduct as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>
                                    <p><a onclick="return ConfirmDel('Bạn có chắc muốn xóa loại sản phẩm này?')"
                                          href="{{route('xoa-loai-sanpham',$value->id)}}">Xóa</a></p>
                                    <p><a href="{{route('sua-loai-sanpham',$value->id)}}">Sửa</a></p>
                                </td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->note}}</td>
                                <td>{{$value->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection