<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('clients', 'ClientController')->except(['show']);
Route::resource('orders', 'OrderController')->except(['show']);
Route::resource('records', 'RecordController')->except(['show']);
Route::resource('reloads', 'ReloadController')->only(['create', 'store']);

// Reports
Route::get('generar-reports', 'Report\ReportAguaController@index')->name('report.index');
Route::get('report-agua', 'Report\ReportAguaController@agua')->name('report.agua');

// Charts
Route::get('dashboard-sisa', 'Dashboard\dashboardChartController@index')->name('dashboard');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
