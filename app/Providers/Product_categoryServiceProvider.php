<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Product_categoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
     
    public function boot()
    {
        //
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
     
    public function register()
    {
        $this->app->bind('App\Repositories\Product_category\Product_categoryContract',
            'App\Repositories\Product_category\EloquentProduct_categoryRepository');
    }
}
