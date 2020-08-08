<?php /** @noinspection PhpUndefinedClassInspection */

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\PrivUrlController;

/**  Defining the namespace to get Laravel's default auth routes working */
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

/** Protected routes */
Route::middleware('auth')->group( function () {
    /** Dashboard GET routes */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/url/search', [PrivUrlController::class, 'search'])->name('url.search.private');
    Route::get('/dashboard/url/{url}/disable', [PrivUrlController::class, 'disable'])->name('url.disable');
    Route::get('/dashboard/url/{url}/enable', [PrivUrlController::class, 'enable'])->name('url.enable');

    /** URL resource routes */
    Route::resource('/dashboard/url', PrivUrlController::class)->except(['show']);

    /**  Auxiliary GET routes for normalization and avoiding tampering and exceptions */
    Route::get('/dashboard/url/{url}', [PrivUrlController::class, 'edit']);
    Route::get('/dashboard/url/delete/{url}', [PrivUrlController::class, 'index']);

    /** General POST routes */
    Route::post('/url/list', [UrlController::class, 'show'])->name('url.list.public');

    /** Dashboard POST routes */
    Route::post('/dashboard/url/list', [PrivUrlController::class, 'show'])->name('url.list.private');
} );









/**  External redirection route */
Route::get('/s/{url:url_token}', [UrlController::class, 'redirect'])->name('redirection');

/**  Static Pages GET rule (catch all) */
Route::get('/{slug?}', PageController::class)
    ->where('slug', '.*')
    ->name('page');
