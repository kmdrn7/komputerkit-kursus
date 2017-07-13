<?php

namespace App\Providers;

use Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		// Default length untuk database
		Schema::defaultStringLength(150);
		// Extend validator untuk cek password lama
		Validator::extend('old_password', function ($attribute, $value, $parameters, $validator)
		{
			return Hash::check($value, current($parameters));
		});

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_TIME, 'id');
    }
}
