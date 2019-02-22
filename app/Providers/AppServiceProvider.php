<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

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
            
            $data = array (
                'categories_published'      => \app\Category::where('published', 1)->count(),
                'products_published'        => \app\Product::where('published', 1)->count(),
                'manufactures_published'    => \app\Manufacture::where('published', 1)->count(),
                'currencies_published'      => \app\Currency::get()->count(),
                'cbr'                       => Cbr::get()
                //'manufacturers_published'   => \app\Product::where('published', 1)->count()
            );
            
//            $view->with('categories', \app\Category::where('published', 1)->get());
            $view->with($data);
        });
    }
}
