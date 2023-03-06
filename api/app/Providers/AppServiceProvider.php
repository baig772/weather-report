<?php

namespace App\Providers;

use App\Interfaces\API\V1\UsersInterface;
use App\Services\API\V1\UsersService;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UsersInterface::class, UsersService::class);
    }
}
