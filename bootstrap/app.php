<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Sentry\Laravel\Integration;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () {
            Route::domain(env('WWW_HOSTNAME'))->group(function () {
                Route::middleware('web')
                ->group(base_path('routes/web.php'));
            });

            Route::domain(env('API_HOSTNAME'))->group(function () {
                Route::middleware('api')
                ->group(base_path('routes/api.php'));
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        Integration::handles($exceptions);
    })->create();
