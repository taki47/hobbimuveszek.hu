<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

use App\Models\Global_setting;

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
        date_default_timezone_set(env("TIMEZONE"));
        Date::setLocale(env("TIMEZONE_LOCALE"));

        view()->composer('*', function($view) {
            $view->with('global', Global_setting::all());
        });
    }
}
