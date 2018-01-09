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

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();



Route::middleware(['auth'])->group(function () {

    Route::get('/','FrontController@index');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('balance', 'DashboardController@balance')->name('balance');
    Route::resource('spending', 'SpendingController');
    Route::resource('user', 'PictureController');


    Route::get('/home', 'DashboardController@index')->name('home');

});