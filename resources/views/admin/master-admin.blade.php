<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}"/>
    <link rel="stylesheet" href="source/concept-master/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="source/concept-master/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="source/concept-master/assets/libs/css/style.css">
    <link rel="stylesheet" href="source/concept-master/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script type="text/javascript" src="source/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="source/concept-master/assets/libs/js/myscript.js"></script>
    <script type="text/javascript" src="source/concept-master/assets/libs/js/Chart.min.js"></script>
    <title>Trang Quản trị</title>
</head>

<body>
<div class="dashboard-main-wrapper">
    @include ('admin.header')
    @include ('admin.left-sidebar')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                @yield('multi_search')
                @yield('list_product_content')
                @yield('add_product_content')
                @yield('edit_product_content')
                @yield('del_product_content')
                @yield('list_type_product_content')
                @yield('add_type_product_content')
                @yield('edit_type_product_content')
                @yield('del_type_product_content')
                @yield('search_content')
                @yield('search_bill_content')
                @yield('list_bill_content')
                @yield('bill_detail_content')
                {{--                @yield('bill_edit_content')--}}
                @yield('statistical_content')
                @yield('list_account_content')
                @yield('add_account_content')
                @yield('list_customer_content')
                @yield('test_ajax_content')
            </div>
            @include ('admin.footer')
        </div>
    </div>
</div>
<script src="source/concept-master/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="source/concept-master/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="source/concept-master/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="source/concept-master/assets/libs/js/main-js.js"></script>
</body>

</html>