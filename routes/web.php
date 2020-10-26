<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomepageController@homeInvestPlan')->name('homepage');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

});

include('admin.php');
