<?php

namespace PostForm\FrontEnd\Providers;

use Illuminate\Support\ServiceProvider;

class FrontEndServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/../Routes/web.php");

        $this->loadViewsFrom(__DIR__."/../Resources/views", 'front_end');

        $this->publishes([
            __DIR__."/../Resources/assets" => public_path('front_end')
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}