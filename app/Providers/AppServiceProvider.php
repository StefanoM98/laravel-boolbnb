<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.admin', function ($view) {
            $user = Auth::user();
            $apartment_ids = $user->apartments->pluck('id')->toArray();
            $messages = Message::whereIn('apartment_id', $apartment_ids)
                ->where('state_message', false)
                ->get();
            $view->with('messages', $messages);
        });
    }
}
