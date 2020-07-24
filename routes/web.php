<?php /** @noinspection PhpUndefinedClassInspection */

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UrlController;

/**
 * General GET routes
 */
Route::get('/', HomeController::class)->name('homepage');
Route::get('/logbook', LogbookController::class)->name('logbook');
Route::get('/about', AboutController::class)->name('about');
Route::get('/todo', TodoController::class)->name('todo');
Route::get('/search', [UrlController::class, 'search'])->name('search');

/**
 * Dashboard GET routes
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/url/create', [UrlController::class, 'create'])->name('url.create');
Route::get('/dashboard/urls/list', [UrlController::class, 'index'])->name('urls.list');
Route::get('/dashboard/url/', [UrlController::class, 'index']);
Route::get('/dashboard/url/search', [UrlController::class, 'search'])->name('url.search.private');
Route::get('/dashboard/url/{url}', [UrlController::class, 'edit'])->name('url.edit');

Route::get('/dashboard/url/disable/{url}', [UrlController::class, 'disable'])->name('url.disable');
Route::get('/dashboard/url/enable/{url}', [UrlController::class, 'enable'])->name('url.enable');

/**
 * Auxiliary GET routes for normalization and to avoid tampering
 */
Route::get('/dashboard/url/update/{url}', [UrlController::class, 'edit']);
Route::get('/dashboard/url/delete/{url}', [UrlController::class, 'index']);

/**
 * General POST routes
 */
Route::post('/urls/list', [UrlController::class, 'show'])->name('urls.list.public');

/**
 * Dashboard POST routes
 */
Route::post('/dashboard/url/create', [UrlController::class, 'store'])->name('url.create');
Route::post('/dashboard/url/update/{url}', [UrlController::class, 'update'])->name('url.update');
Route::post('/dashboard/url/delete/{url}', [UrlController::class, 'destroy'])->name('url.delete');
Route::post('/dashboard/urls/list', [UrlController::class, 'show'])->name('urls.list.private');

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


