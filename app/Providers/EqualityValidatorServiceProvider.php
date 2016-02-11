<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EqualityValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('equality', function($attribute, $value, $parameters, $validator) {
            return $value == parameters["str"];
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
