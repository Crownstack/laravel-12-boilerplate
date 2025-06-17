<?php

use Illuminate\Support\Facades\Route;

/** Home Page */
Route::get('/', [\App\Http\Controllers\V1\Web\StaticPageController::class, 'index'])->name('indexPage');

/** Sitemap */
Route::get('sitemap.xml', [\App\Http\Controllers\V1\Web\StaticPageController::class, 'sitemap'])->name('sitemapPage');
