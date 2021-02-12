<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

use App\Models\Global_setting;
use App\Models\Category;

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
            $view->with('global', Global_setting::all())
                ->with('parentCategories', Category::where("parent_id", "0")->orderBy("position")->get());
        });
    }
}
