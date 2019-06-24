<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

use Illuminate\Pagination\Paginator;

use app\MyClasses\Cbr;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        date_default_timezone_set('Europe/Moscow');
        
        Paginator::defaultView('admin.components.pagination');
        self::adminMenu();
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
    
    public function adminMenu()
    {
        View::composer('admin.layouts.app_admin', function ($view){
            
            // $cbr = Cache::get('cbr', function() {
            //     Cache::put('cbr', $cbr, 600);
            //     return Cbr::get();
            // });

            $hour = 60;

            // $cbr = Cache::remember('cbr', $hour/600, function() {
            //     return Cbr::get();
            // });
            //$cbr = Cbr::get();
            $cbrToday = Cbr::today();
            $cbrTomorrow = Cbr::tomorrow();


            // $cbrNames = Cache::remember('cbr', $hour, function() {
            //     return Cbr::getNames();
            // });

            $cbrNames = Cbr::getNames();
            //dd($cbrNames);

            $categories_published = Cache::remember('categories_published', $hour, function() {
                return \app\Category::publishedCount();
            });
            $products_published = Cache::remember('products_published', $hour, function() {
                return \app\Product::publishedCount();
            });
            $manufactures_published = Cache::remember('manufactures_published', $hour, function() {
                return \app\Manufacture::publishedCount();
            });  
            $currencies_published = Cache::remember('currencies_published', $hour, function() {
                return \app\Currency::count();
            });               

            $data = array (
                'categories_published'      => $categories_published,
                'products_published'        => $products_published,
                'manufactures_published'    => $manufactures_published,
                'currencies_published'      => $currencies_published,
                'cbrToday'                  => $cbrToday,
                'cbrTomorrow'               => $cbrTomorrow,
                'cbrNames'                  => $cbrNames
            );

            // $cbr = Cbr::get();

            // Cache::put('cbr', $cbr, 600);

            // $value = Cache::get('cbr');
            
            $view->with($data);
        });
    }
}
