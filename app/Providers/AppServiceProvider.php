<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Gig;
use App\Models\User;
use  App\Observers\GigObserver;
use  App\Observers\AuthObserver;

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
        Gig::observe(GigObserver::class);
        User::observe(AuthObserver::class);
    }
}
