<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'frontpage.index')->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

});
