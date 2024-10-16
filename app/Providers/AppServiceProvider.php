<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
// use App\Configuracion;
// use App\Servicio;

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
        // $config = Configuracion::first();
        // $servicios = Servicio::all();

        // View::composer(['auth.login', 'auth.register'], function ($view) use ($config, $servicios) {
        //     $view->with([
        //         'config' => $config,
        //         'servicios' => $servicios,
        //     ]);
        // });

        // View::composer(['auth.login', 'auth.register'], function ($view) use ($config) {
        //     $view->with([
        //         'config' => $config,
        //     ]);
        // });
    }
}
