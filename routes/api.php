<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'status' => 'ok',
        'message' => 'API Service seems to be running',
        'api_version' => 'v1',
        'laravel' => [
            'version' => app()::VERSION,
            'php_version' => (phpversion()),
            'timezone' => config('app.timezone')
        ],
        'server' => [
            'timezone' => (new DateTime())->getTimezone(),
            'current_time' => \Carbon\Carbon::now()->toDateTimeString()
        ],
    ];
});

/**
 * POST		/subscribe
 *
 * API to submit a subscribe form
 */
Route::post('subscribe', [\App\Http\Controllers\V1\Api\SubscribeController::class, 'submitSubscribeForm'])->name('api.subscribe.submit');
