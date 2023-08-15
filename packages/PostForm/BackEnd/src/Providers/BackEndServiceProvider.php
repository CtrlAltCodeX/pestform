<?php

namespace PostForm\BackEnd\Providers;

use Illuminate\Support\ServiceProvider;

class BackEndServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/../Routes/web.php");

        $this->loadViewsFrom(__DIR__."/../Resources/views", 'back_end');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->publishes([
            __DIR__."/../Resources/assets" => public_path('back_end')
        ]);
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