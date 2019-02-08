<?php

namespace Parquet\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;

use Parquet\MyClasses\Cbr;

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
                'categories_published'      => \Parquet\Category::where('published', 1)->count(),
                'products_published'        => \Parquet\Product::where('published', 1)->count(),
                'cbr'                       => Cbr::get()
                //'manufacturers_published'   => \Parquet\Product::where('published', 1)->count()
            );
            
//            $view->with('categories', \Parquet\Category::where('published', 1)->get());
            $view->with($data);
        });
    }
}
