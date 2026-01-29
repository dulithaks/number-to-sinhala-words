<?php

namespace Dulithaks\NumberToSinhalaWords;

use Illuminate\Support\ServiceProvider;

class NumberToSinhalaWordsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('number-to-sinhala-words', function ($app) {
            return new SinhalaConverter();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
