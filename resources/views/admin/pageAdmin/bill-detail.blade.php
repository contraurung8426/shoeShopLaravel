@extends('admin.master-admin')
@section('bill_detail_content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Chi Tiết Hóa Đơn</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Hóa Đơn</li>
                            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Hóa Đơn</li>
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
                    <th class="border-0">Hình ảnh</th>
                    <th class="border-0">Tên sản phẩm</th>
                    <th class="border-0">Số lương mua</th>
                    <th class="border-0">Đơn giá</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $index = 0;
                ?>
                @foreach($billdetail as $value)
                    <?php
                    $product = DB::table('products')->where('id', $value->id_product)->first();
                    ?>
                    <tr>
                        <td>
                            <?php
                            $index++;
                            echo $index;
                            ?>
                        </td>
                        <td>
                            <div class="m-r-10"><img src="source/images/product/<?php echo $product->image ?>"
                                                     alt="user" class="rounded" width="80" height="60"></div>
                        </td>
                        <td><?php echo $product->name ?></td>
                        <td>{{$value->quantity}}</td>
                        <td>{{$value->unit_price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
