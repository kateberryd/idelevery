<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Repositories\Pages\PagesContract',
            'App\Repositories\Pages\EloquentPagesRepository');
    }
}
