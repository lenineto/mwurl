<?php

Auth::routes();

Route::get('/', 'HomeController')->name('homepage');
Route::get('/logbook', 'LogbookController')->name('logbook');
Route::get('/about', 'AboutController')->name('about');
Route::get('/todo', 'TodoController')->name('todo');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/list-urls', 'UrlController@index')->name('list-urls');
Route::get('/dashboard/disable-url', 'UrlController@disable')->name('disable-url');
Route::get('/dashboard/enable-url', 'UrlController@enable')->name('enable-url');
Route::get('/dashboard/create-url', 'UrlController@create')->name('create-url');
Route::post('/dashboard/store-url', 'UrlController@store')->name('store-url');
Route::get('/dashboard/edit-url', 'UrlController@edit')->name('edit-url');
Route::post('/dashboard/update-url', 'UrlController@update')->name('update-url');
Route::post('/dashboard/delete-url', 'UrlController@destroy')->name('delete-url');
Route::get('/dashboard/search', 'UrlController@search')->name('user-search');
Route::get('/search', 'UrlController@search')->name('search');
Route::post('/dashboard/search', 'UrlController@show')->name('user-urls');
Route::post('/search', 'UrlController@show')->name('public-urls');
Route::get('s/{token}', 'UrlController@redirect')->name('redirection');
