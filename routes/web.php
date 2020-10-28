<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomepageController@homeInvestPlan')->name('homepage');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('settings/edit', 'UserController@personal_info')->name('personal_info');
    Route::post('settings/edit/store', 'UserController@personal_info_store')->name('personal_info.store');
    Route::get('kyc-verification', 'UserController@kyc_verification')->name('kyc_verification');

});

include('admin.php');
