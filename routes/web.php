<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/logbook', function () {
    return view('logbook');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/todo', function () {
    return view('todo');
});

Route::get('/search', function () {
    return view('search');
});

Route::post('/search/url', function () {
    return view('results');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/list-urls', 'UrlController@index')->name('list-urls');
Route::get('/dashboard/disable-url', 'UrlController@disable')->name('disable-url');
Route::get('/dashboard/enable-url', 'UrlController@enable')->name('enable-url');
Route::get('/dashboard/create-url', 'UrlController@create')->name('create-url');
Route::post('/dashboard/store-url', 'UrlController@store')->name('store-url');
Route::get('/dashboard/edit-url', 'UrlController@edit')->name('edit-url');
Route::post('/dashboard/update-url', 'UrlController@update')->name('update-url');
Route::post('/dashboard/delete-url', 'UrlController@destroy')->name('delete-url');

