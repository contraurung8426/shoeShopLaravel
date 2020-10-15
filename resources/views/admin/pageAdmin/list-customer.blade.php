@extends('admin.master-admin')
@section('list_customer_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Khách Hàng</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Khách Hàng</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('danhsach-khachhang')}}">Danh Sách Khách Hàng</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Khách Hàng</h5>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thao tác</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $value)
                            <form action="{{route('danhsach-khachhang')}}" method="get">
                                <input type="hidden" name="id_customer" value="{{$value->id}}">
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>
                                        <p>
                                            <a onclick="return ConfirmDel('Bạn có chắc muốn xóa khách hàng có tên là {{$value->name}}?')"
                                               href="{{route('xoa-khachhang',$value->id)}}">Xóa
                                            </a>
                                            <button type="submit" href="{{route('danhsach-khachhang')}}"
                                                    style="border: none;background-color: transparent;color: #71748d;">Sửa
                                            </button>
                                        </p>
                                    </td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>
                                        <input style="border: none;background-color: transparent;color: #212529;" type="text" name="address" value="{{$value->address}}" required>
                                    </td>
                                    <td>{{$value->phone_number}}</td>
                                    <td>
                                        @if ($value->status==1)
                                            Chưa có tài khoản
                                        @else
                                            Đã có tài khoản
                                        @endif
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection