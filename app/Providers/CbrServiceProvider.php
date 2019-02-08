<?php

namespace Paqrquet\Providers;
 
use Illuminate\Foundation\AliasLoader;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
 
class CbrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
 
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('Cbr', function()
        {
            return new Parquet\MyClasses\Cbr;
        });
    }
}
