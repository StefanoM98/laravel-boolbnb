<?php

namespace App\Providers;

use Braintree\Configuration;
use Braintree\Gateway;
use Illuminate\Pagination\Paginator;
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
        // $this->app->singleton(Gateway::class, function($app){
        //     return new Gateway(
        //         [
        //             'environment' => 'sandbox',                     
        //             'merchantId' => 'ttzvfrs83js9zcgb',                     
        //             'publicKey' => 'c45gyyxspwxbmy4m',                     
        //             'privateKey' => 'f559b80fbf6029157bfa4fd6e05f19ba',
        //         ]
        //     );
        // });
        Configuration::environment(env("BRAINTREE_ENV"));
        Configuration::merchantId(env("BRAINTREE_MERCHANT_ID"));
        Configuration::publicKey(env("BRAINTREE_PUBLIC_KEY"));
        Configuration::privateKey(env("BRAINTREE_PRIVATE_KEY"));

        // * Use Bootstrap Paginator
        Paginator::useBootstrap();
    }
}
