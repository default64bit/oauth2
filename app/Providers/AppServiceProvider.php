<?php

namespace App\Providers;

use App\Http\Controllers\AccessTokenController as AppAccessTokenController;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Http\Controllers\AccessTokenController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // for changing Oauth error structure... also uncomment exceptions/Handler.php render method codes
        // $this->app->bind( AccessTokenController::class, AppAccessTokenController::class);
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
