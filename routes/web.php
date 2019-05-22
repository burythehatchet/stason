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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/appointments/get_available_times', 'AppointmentsController@get_available_times');
Route::get('/appointments_doctor', 'AppointmentsController@index_doctor');

Route::resource('appointments', 'AppointmentsController');
