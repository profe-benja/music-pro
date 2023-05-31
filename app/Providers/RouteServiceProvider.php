<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group( function(){
                  require base_path('routes/api.php');
                  require base_path('routes/apis/tarjeta.php');
                  // require base_path('routes/spervicios/tarjeta.php');
                  // require base_path('routes/servicios/transporte.php');
                  // require base_path('routes/servicios/bodega.php');
                });

            // Route::middleware('web')
            //     ->group(base_path('routes/web.php'));

            Route::middleware('web')
              ->group( function(){
                require base_path('routes/web.php');
                require base_path('routes/servicios/sucursal.php');
                require base_path('routes/servicios/tarjeta.php');
                require base_path('routes/servicios/transporte.php');
                require base_path('routes/servicios/bodega.php');
              });
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
