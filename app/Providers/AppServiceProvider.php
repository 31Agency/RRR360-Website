<?php

namespace App\Providers;

use App\Http\View\Composers\CheckVerificationComposer;
use App\Http\View\Composers\LayoutComposer;
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
        View::composer('*', LayoutComposer::class);

        // Check OTP
        View::composer('layouts.admin', CheckVerificationComposer::class);
        View::composer('layouts.customize-admin', CheckVerificationComposer::class);
    }
}
