<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',                     
                    'merchantId' => 'ttzvfrs83js9zcgb',                     
                    'publicKey' => 'c45gyyxspwxbmy4m',                     
                    'privateKey' => 'f559b80fbf6029157bfa4fd6e05f19ba',
                ]
            );
        });
    }
}
