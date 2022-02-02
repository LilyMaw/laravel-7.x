<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\TodoDaoInterface', 'App\Dao\TodoDao');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Service\TodoServiceInterface', 'App\Service\TodoService');
        $this->app->bind('App\Contracts\Service\UserServiceInterface', 'App\Service\UserService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
