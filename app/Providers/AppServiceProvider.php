<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		view()->composer('*', function($view) {
			$vremote = Request::ajax() ? true : null;
            $vlayout = $vremote ? 'layouts.ajax' : 'layouts.html'; // resources/views/layouts/html.blade.php
            $view->with(compact('vremote', 'vlayout'));
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
