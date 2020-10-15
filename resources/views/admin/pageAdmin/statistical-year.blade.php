@extends('admin.master-admin')
@section('statistical_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Sản phẩm bán nhiều nhất trong năm</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Thống Kê</li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{route('thongke-theonam')}}">Sản Phẩm Bán Nhiều Nhất Trong Năm</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('admin.message')
    <div class="row">
        <div class="card-body">
            <form action="{{route('thongke-theonam')}}" method="get">
                <div class="form-row">
                    <label for="validationCustom03" style="width: 70px;padding-top: 5px;">Nhập năm</label>
                    <div class="col-xl-1 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="number" min="2018" max="2050" value="2019" class="form-control" name="year"
                               required>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                        <input type="submit" class="form-control" value="Thống kê">
                    </div>
                </div>
            </form>

        </div>
    </div>
    @if (isset($product))
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Sản phẩm bán chạy</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Tên Loại Sản Phẩm</th>
                                <th scope="col">Tổng số lượng bán ra</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $value)
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$test[$dem++]->totalQty}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

