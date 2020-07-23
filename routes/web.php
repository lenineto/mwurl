<?php /** @noinspection PhpUndefinedClassInspection */

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UrlController;


Route::get('/', HomeController::class)->name('homepage');
Route::get('/logbook', LogbookController::class)->name('logbook');
Route::get('/about', AboutController::class)->name('about');
Route::get('/todo', TodoController::class)->name('todo');
Route::get('/search', [UrlController::class, 'search'])->name('search');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/create-url', [UrlController::class, 'create'])->name('create-url');
Route::get('/dashboard/list-urls', [UrlController::class, 'index'])->name('list-urls');
Route::get('/dashboard/search', [UrlController::class, 'search'])->name('user-search');
Route::get('/dashboard/create-url', [UrlController::class, 'store'])->name('create-url');
Route::get('/dashboard/edit-url', [UrlController::class, 'edit'])->name('edit-url');

Route::get('/dashboard/disable-url', [UrlController::class, 'disable'])->name('disable-url');
Route::get('/dashboard/enable-url', [UrlController::class, 'enable'])->name('enable-url');

Route::get('/s/{token}', [UrlController::class, 'redirect'])->name('redirection');

Route::post('/search', [UrlController::class, 'show'])->name('public-urls');

Route::post('/dashboard/store-url', [UrlController::class, 'store'])->name('store-url');
Route::post('/dashboard/update-url', [UrlController::class, 'update'])->name('update-url');
Route::post('/dashboard/delete-url', [UrlController::class, 'destroy'])->name('delete-url');
Route::post('/dashboard/search', [UrlController::class, 'show'])->name('user-urls');

/**
 * Defining the namespace to get Laravel's default auth routes working
 */
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});


