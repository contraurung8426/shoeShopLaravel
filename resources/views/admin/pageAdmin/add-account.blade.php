@extends('admin.master-admin')
@section('add_account_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Thêm Tài Khoản</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Tài Khoản</li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Tài Khoản</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if (count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
    @endif
    @include('admin.message')
    <div class="row">
        <div class="card-body">
            <form action="{{route('them-taikhoan')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="validationCustom03">Tên người dùng</label>
                        <input type="text" name="full_name" class="form-control" id="validationCustom01"
                               placeholder="Tên người dùng" required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="input-select">Email</label>
                        <input type="email" name="email" class="form-control" id="validationCustom02"
                               placeholder="Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label class="col-form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="validationCustom03"
                               placeholder="Mật khẩu" required>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label class="col-form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="re_password" class="form-control" id="validationCustom04"
                               placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label class="col-form-label">Quyền</label>
                        <select class="form-control" name="premission" id="input-select">
                            <option value="admin">Admin</option>
                            <option value="customer" selected>Khách hàng</option>
                        </select>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label class="col-form-label">Số điện thoại</label>
                        <input name="phone" type="number" class="form-control" min="0"
                               placeholder="SĐT">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="exampleFormControlTextarea1">Địa chỉ</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Thêm tài khoản</button>
                </div>
            </form>
        </div>
    </div>
@endsection