<?php

namespace App\Providers;
use App\Cart;
use App\Compare;
use Session;
use Illuminate\Support\ServiceProvider;
use App\Product;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('pages.cart', function($view) {
            if(Session('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('pages.compare', function($view) {
            if(Session('compare')) {
                $oldCompare = Session::get('compare');
                $compare = new Compare($oldCompare);
                $view->with(['compare'=>Session::get('compare'), 'product_compare'=>$compare->items]);
            }
        }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
