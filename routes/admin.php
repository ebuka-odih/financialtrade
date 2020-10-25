<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('all-users', 'admin\AdminController@users')->name('users');

});
