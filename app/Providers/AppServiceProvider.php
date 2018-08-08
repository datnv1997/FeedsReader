<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(
             'App\Reponsitories\Eloquent\HomeEloquentInterface',
             'App\Reponsitories\Eloquent\HomeEloquentReponsitory'
         );

         $this->app->bind(
             'App\Reponsitories\Eloquent\Startup\startupEloquentInterface',
             'App\Reponsitories\Eloquent\Startup\StartupEloquentReponsitory'
         );
    }
}
