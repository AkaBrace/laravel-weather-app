<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\ZipCode;

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

        $this->app->instance('User', $user);
        $this->app->instance('ZipCode', $zip);
    }
}
