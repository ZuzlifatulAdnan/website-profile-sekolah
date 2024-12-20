<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

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
        Filament::registerRenderHook(
            'head.end',
            fn (): string => '<link rel="icon" href="'.asset('images/favicon.ico').'" type="image/x-icon" />'
        );
    }
}
