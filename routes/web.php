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

Route::get('/dashboard', function () {
    return view('dashboard');
});
