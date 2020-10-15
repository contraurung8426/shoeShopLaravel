<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', ["as" => "trang-chu", "uses" => "PageController@getIndex"]);

Route::get('about', ["as" => "gioi-thieu", "uses" => "PageController@getAbout"]);

Route::get('checkout', ["as" => "dat-hang", "uses" => "PageController@getCheckout"]);

Route::get('contact', ["as" => "lien-he", "uses" => "PageController@getContact"]);

Route::get('faqs', ["as" => "dieu-khoan", "uses" => "PageController@getFaqs"]);

Route::get('products', ["as" => "san-pham", "uses" => "PageController@getProducts"]);

Route::get('shoppingcart', ["as" => "gio-hang", "uses" => "PageController@getShoppingcart"]);

Route::get('productdetail/{id}', ["as" => "chitiet-sanpham", "uses" => "PageController@getProductDetail"]);

Route::get('typeproduct/{type}', ["as" => "loai-sanpham", "uses" => "PageController@getTypeProduct"]);

//Route::get('add-to-cart/{id}', ["as" => "them-gio-hang", "uses" => "PageController@getAddtocart"]);

Route::post('add-to-cart', ["as" => "them-gio-hang", "uses" => "PageController@postAddtocart"]);

Route::get('update-cart/{id}', ["as" => "capnhat-gio-hang", "uses" => "PageController@getUpdatecart"]);

Route::get('del-cart/{id}', ["as" => "xoa-gio-hang", "uses" => "PageController@getDelItemcart"]);

Route::post('checkout', ["as" => "dat-hang", "uses" => "PageController@postCheckout"]);

Route::get('search', ["as" => "tim-kiem", "uses" => "PageController@getSearch"]);

//phần đăng nhập, đăng ký, quên mật khẩu, kích hoạt tài khoản

Route::get('signup', ["as" => "dang-ky", "uses" => "PageController@getSignUp"]);

Route::post('signup', ["as" => "dang-nhap", "uses" => "PageController@postSignUp"]);

Route::get('signin', ["as" => "dang-nhap", "uses" => "PageController@getSignIn"]);

Route::post('signin', ["as" => "dang-nhap", "uses" => "PageController@postSignIn"]);

Route::get('signout', ["as" => "dang-xuat", "uses" => "PageController@getSignOut"]);

Route::get('forgetpassword', ["as" => "quen-matkhau", "uses" => "PageController@getForgetPassword"]);

Route::post('forgetpassword', ["as" => "quen-matkhau", "uses" => "PageController@postForgetPassword"]);

Route::get('newpassword/{id}', ["as" => "gui-matkhau", "uses" => "AdminController@getNewPassword"]);

Route::get('auth-account/{token}', ["as" => "kichhoat-taikhoan", "uses" => "PageController@getAuthAccount"]);

//Thay đổi thông tin tài khoản cá nhân
Route::get('info-account', ["as" => "tt-taikhoan", "uses" => "PageController@getInfoAccount"]);

Route::get('edit-account', ["as" => "sua-tt-taikhoan", "uses" => "PageController@getEditAccount"]);

Route::get('edit-password', ["as" => "doi-matkhau", "uses" => "PageController@getEditPassword"]);

Route::post('edit-password', ["as" => "doi-matkhau", "uses" => "PageController@postEditPassword"]);

Route::post('edit-account', ["as" => "sua-tt-taikhoan", "uses" => "PageController@postEditAccount"]);
//Phần Mail
Route::post('contact', ["as" => "lien-he", "uses" => "PageController@postContact"]);

Route::get('test-ajax', ["as" => "ajax1", "uses" => "AdminController@getTestAjax"]);

Route::get('test-ajax-2', ["as" => "ajax2", "uses" => "AdminController@getTestAjax2"]);

Route::get('hello', ["as" =>"hello"],function (){
    return 'Hello Le Van Tan';
});

/////////////////////////ADMIN
Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'product'], function () {
        Route::get('list-product', ["as" => "danhsach-sanpham", "uses" => "AdminController@getListProduct"]);

        Route::get('add-product', ["as" => "them-sanpham", "uses" => "AdminController@getAddProduct"]);

        Route::post('add-product', ["as" => "them-sanpham", "uses" => "AdminController@postAddProduct"]);

        Route::get('edit-product/{id}', ["as" => "sua-sanpham", "uses" => "AdminController@getEditProduct"]);

        Route::post('edit-product/{id}', ["as" => "sua-sanpham", "uses" => "AdminController@postEditProduct"]);

        Route::get('del-product/{id}', ["as" => "xoa-sanpham", "uses" => "AdminController@getDelProduct"]);

    });

    Route::group(['prefix' => 'typeproduct'], function () {
        Route::get('list-type-product', ["as" => "danhsach-loai-sanpham", "uses" => "AdminController@getListTypeProduct"]);

        Route::get('add-type-product', ["as" => "them-loai-sanpham", "uses" => "AdminController@getAddTypeProduct"]);

        Route::get('edit-type-product/{id}', ["as" => "sua-loai-sanpham", "uses" => "AdminController@getEditTypeProduct"]);

        Route::post('edit-type-product/{id}', ["as" => "sua-loai-sanpham", "uses" => "AdminController@postEditTypeProduct"]);

        Route::get('del-type-product/{id}', ["as" => "xoa-loai-sanpham", "uses" => "AdminController@getDelTypeProduct"]);

        Route::post('add-type-product', ["as" => "them-loai-sanpham", "uses" => "AdminController@postAddTypeProduct"]);
    });

    Route::group(['prefix' => 'bill'], function () {
        Route::get('list-bill', ["as" => "danhsach-hoadon", "uses" => "AdminController@getListBill"]);

        Route::get('bill-detail/{id}', ["as" => "chi-tiet-hoadon", "uses" => "AdminController@getBillDetail"]);
    });

    Route::group(['prefix' => 'statistical'], function () {
        Route::get('month', ["as" => "thongke-theothang", "uses" => "AdminController@getStatisticalMonth"]);

        Route::get('quarter', ["as" => "thongke-theoquy", "uses" => "AdminController@getStatisticalQuarter"]);

        Route::get('year', ["as" => "thongke-theonam", "uses" => "AdminController@getStatisticalYear"]);

        Route::get('view', ["as" => "thongke-truycap", "uses" => "AdminController@getStatisticalView"]);
    });

    Route::group(['prefix' => 'account'], function () {
        Route::get('list-account', ["as" => "danhsach-taikhoan", "uses" => "AdminController@getListAccount"]);

        Route::get('lock-account/{id}', ["as" => "khoa-taikhoan", "uses" => "AdminController@getLockAccount"]);

        Route::get('add-account', ["as" => "them-taikhoan", "uses" => "AdminController@getAddAccount"]);

        Route::post('add-account', ["as" => "them-taikhoan", "uses" => "AdminController@postAddAccount"]);
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('list-customer', ["as" => "danhsach-khachhang", "uses" => "AdminController@getListCustomer"]);

        Route::get('del-customer/{id}', ["as" => "xoa-khachhang", "uses" => "AdminController@getDelCustomer"]);

    });
});




