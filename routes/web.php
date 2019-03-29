<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ads', 'AdsController', ['except' => ['index']]);
