<?php

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

Route::get('/', 'WeatherController@index')->name('weather.home');
Route::post('show','WeatherController@show')->name('weather.show');
Route::get('exception','WeatherController@exception_error')->name('weather.error');