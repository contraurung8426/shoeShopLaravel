<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Shop giày số 1 Việt Nam</title>
    <base href="{{asset('')}}"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <link href="source/css/templatemo_style.css" rel="stylesheet" type="text/css"/>
    <link href="source/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="source/css/nivo-slider.css" rel="stylesheet" type="text/css" media="screen"/>

    <link rel="stylesheet" type="text/css" href="source/css/ddsmoothmenu.css"/>
    <script type="text/javascript" src="source/js/jquery.min.js"></script>
    <script type="text/javascript" src="source/js/ddsmoothmenu.js">
    </script>
    <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "top_nav", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

</head>

<body>

<div id="templatemo_body_wrapper">
    <div id="templatemo_wrapper">
        @include ('header')
        @include ('menubar')
        <div id="templatemo_main">
            <div id="sidebar" class="float_l">
                @yield('multi_search')
                @include ('categories')
                @include ('bestsellers')
            </div>
            <div id="content" class="float_r">
                @yield('product_slider')
                @yield('product_new_product')
                @yield('product_sale_product')
                @yield('about_content')
                @yield('checkout_content')
                @yield('contact_content')
                @yield('faqs_content')
                @yield('products_content')
                @yield('producttype_content')
                @yield('shoppingcart_content')
                @yield('productdetail_content')
                @yield('related_product_content')
                @yield('search_content')
                @yield('sign_up_content')
                @yield('sign_in_content')
                @yield('forget_password_content')
                @yield('account_content')
            </div>
            <div class="cleaner"></div>
        </div> <!-- END of templatemo_main -->
        @include ('footer')
    </div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>