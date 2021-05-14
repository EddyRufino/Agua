<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('clients', 'ClientController')->except(['show']);
Route::resource('orders', 'OrderController')->except(['show']);
Route::resource('records', 'RecordController')->except(['show']);
Route::resource('reloads', 'ReloadController')->only(['create', 'store']);

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
