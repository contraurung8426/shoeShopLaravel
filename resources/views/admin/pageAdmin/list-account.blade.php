@extends('admin.master-admin')
@section('list_account_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Tài Khoản</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Tài Khoản</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('danhsach-sanpham')}}">Danh Sách Tài Khoản</a></li>
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
                    <th class="border-0">Tên</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Địa chỉ</th>
                    <th class="border-0">Điện thoại</th>
                    <th class="border-0">Quyền</th>
                    <th class="border-0">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>
                            @if($value->locked==0)
                                <p><a onclick="return ConfirmDel('Bạn muốn khóa tài khoản của {{$value->full_name}}?')"
                                      href="{{route('khoa-taikhoan',$value->id)}}">Khóa</a></p>
                            @else
                                <p><a href="{{route('khoa-taikhoan',$value->id)}}">Mở khóa</a></p>
                            @endif
                        </td>
                        <td>{{$value->full_name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->phone_number}}</td>
                        <td>{{$value->premission}}</td>
                        <td>
                            @if($value->status == 1)
                                Đã kích hoạt
                            @else
                                Chưa kích hoạt
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection