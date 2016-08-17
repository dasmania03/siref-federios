<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NumtoletterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('numtoletter', function()
        {
            return new \App\Components\NumtoLetter;
        });
    }
}