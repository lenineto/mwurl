<?php /** @noinspection PhpUndefinedClassInspection */

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UrlController;

/**
 * Dashboard GET routes
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/url/search', [UrlController::class, 'search'])->name('url.search.private');
Route::get('/dashboard/url/{url}/disable', [UrlController::class, 'disable'])->name('url.disable');
Route::get('/dashboard/url/{url}/enable', [UrlController::class, 'enable'])->name('url.enable');

/** URL resource routes */
Route::resource('/dashboard/url', UrlController::class)->except(['show']);

/**
 * Auxiliary GET routes for normalization and avoiding tampering and exceptions
 */
Route::get('/dashboard/url/{url}', [UrlController::class, 'edit']);
Route::get('/dashboard/url/delete/{url}', [UrlController::class, 'index']);

/**
 * General POST routes
 */
Route::post('/url/list', [UrlController::class, 'show'])->name('url.list.public');

/**
 * Dashboard POST routes
 */
Route::post('/dashboard/url/list', [UrlController::class, 'show'])->name('url.list.private');

/**
 * External redirection route
 */
Route::get('/s/{url:url_token}', [UrlController::class, 'redirect'])->name('redirection');

/**
 * Defining the namespace to get Laravel's default auth routes working
 */
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

/**
 *  Static Pages GET rule (catch all)
 */
Route::get('/{slug?}', PageController::class)
    ->where('slug', '.*')
    ->name('page');
