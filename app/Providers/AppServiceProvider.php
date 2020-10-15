<?php

namespace App\Providers;

use App\Cart;
use App\Notification;
use App\Product;
use function foo\func;
use Illuminate\Support\ServiceProvider;
use App\ProductType;
use mysql_xdevapi\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('menubar', function ($view) {
            $loaisp = ProductType::all();
            $view->with('loaisp', $loaisp);
        });

        view()->composer('categories', function ($view) {
            $danhmuc = ProductType::all();
            $view->with('danhmuc', $danhmuc);
        });

        view()->composer('bestsellers', function ($view) {
            $sp_ban_chay = Product::where('status', 3)->skip(0)->take(3)->get();
            $view->with('sp', $sp_ban_chay);
        });

        view()->composer('header', function ($view) {
            if (Session('cart')) {
                $oldCart = \Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => \Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice'
                => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });

        view()->composer('admin.header',function ($view){
            $notice = Notification::where('status',0)->get();
            $view->with('notice',$notice);
        });

    }
}
