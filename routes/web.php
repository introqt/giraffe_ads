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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'HomeController@create')->name('create');
Route::get('/{ad}', 'HomeController@show')->name('show');
Route::get('/edit/{ad}', 'HomeController@edit')->name('edit');
Route::post('/save', 'HomeController@save');
Route::delete('/edit/{ad}', 'HomeController@delete')->name('edit');
Route::get('/save', function () {
    return redirect('home');
});
