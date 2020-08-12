<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UrlController;

/**  Defining the namespace to get Laravel's default auth routes working */
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

/**  External redirection route */
Route::get('/s/{url:token}', [UrlController::class, 'redirect'])->name('redirection');

/** Protected routes */
Route::middleware('auth')->group( function () {
    /** Dashboard routes */
    Route::get('/dashboard', [UrlController::class, 'index'])->name('page.show.dashboard')->defaults('slug', 'dashboard');
    Route::get('/dashboard/url/search', [UrlController::class, 'search'])->name('url.search.private');
    Route::get('/dashboard/url/{url}/disable', [UrlController::class, 'disable'])->name('url.disable');
    Route::get('/dashboard/url/{url}/enable', [UrlController::class, 'enable'])->name('url.enable');
    Route::post('/dashboard/urls', [UrlController::class, 'listPrivate'])->name('url.list.private');

    /** URL resource routes */
    Route::resource('/dashboard/url', UrlController::class)->except('show');
} );

/** General POST routes */
Route::post('/url/list', [UrlController::class, 'listPublic'])->name('url.list.public');

/**  Static Pages GET rule (catch all) */
Route::get('/{slug?}', [PageController::class, 'show'])->name('page.show')->where('slug', '.*');
