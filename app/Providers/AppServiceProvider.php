<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\ZipCode;
use App\Weather;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot ()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register ()
    {
        $user = new User();
        $zip = new ZipCode();
        $weather = new Weather();

        $this->app->instance('User', $user);
        $this->app->instance('ZipCode', $zip);
        $this->app->instance('Weather', $weather);
    }
}
