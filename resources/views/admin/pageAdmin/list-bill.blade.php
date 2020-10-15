@extends('admin.master-admin')
@section('search_bill_content')
    <div class="row">
        <div class="card-body">
            <form action="{{route('danhsach-hoadon')}}" method="get">
                <div class="form-row">
                    <label for="validationCustom03" style="width: 70px;padding-top: 5px;">Ngày lập</label>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">

                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="col-xl-1 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="submit" class="form-control" value="Lọc">
                    </div>
                </div>
            </form>
            <form action="{{route('danhsach-hoadon')}}" method="get">
                <div class="form-row">
                    <label for="validationCustom03" style="width: 70px;padding-top: 5px;">Trạng thái</label>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <select class="form-control" name="status" id="input-select">
                            @foreach($status as $tus)
                                <option value="{{$tus[0]}}">{{$tus[1]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-1 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="submit" class="form-control" value="Lọc">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('list_bill_content')
    @include('admin.message')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Danh Sách Hóa Đơn</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Hóa Đơn</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('danhsach-hoadon')}}">Danh Sách Hóa Đơn</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                <tr class="border-0">
                    <th class="border-0">#</th>
                    <th class="border-0">Thao tác</th>
                    <th class="border-0">Khách hàng</th>
                    <th class="border-0">Ngày lập</th>
                    <th class="border-0">Tổng tiền</th>
                    <th class="border-0">Thanh toán</th>
                    <th class="border-0">Ghi chú</th>
                    <th class="border-0">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill as $value)
                    <form action="{{route('danhsach-hoadon')}}" method="get">
                        <input type="hidden" name="id_bill" value="{{$value->id}}">
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>
                                <p><a href="{{route('chi-tiet-hoadon',$value->id)}}">Chi tiết</a></p>
                                <button type="submit" href="{{route('danhsach-hoadon')}}"
                                        style="border: none;background-color: transparent;color: #71748d;">Sửa
                                </button>
                            </td>
                            <td>
                                @foreach($customer as $cus)
                                    @if ($cus->id == $value->id_customer)
                                        {{$cus->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{$value->date_order}}</td>
                            <td>{{$value->total}}</td>
                            <td>{{$value->payment}}</td>
                            <td>{{$value->note}}</td>
                            <td>
                                {{--                            {{$status[$value->status]}}--}}
                                <select style="border: none;background-color: transparent;color: #212529;"
                                        class="form-control" name="edit_status" id="input-select">
                                    @foreach($status as $tus)
                                        @if ($value->status==$tus[0])
                                            <option value="{{$tus[0]}}" selected>{{$tus[1]}}</option>
                                        @else
                                            <option value="{{$tus[0]}}">{{$tus[1]}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
