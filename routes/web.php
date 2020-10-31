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
    Route::post('kyc_verification/store', 'UserController@kyc_store')->name('kyc_store');
    Route::get('profile/details', 'UserController@profile_details')->name('profile_details');
    Route::post('profile/details/store', 'UserController@profile_picture_store')->name('profile_picture_store');
    Route::get('change/password', 'UserController@change_password')->name('change_password');
    Route::post('change-password', 'UserController@change_password_store')->name('change.password');

//    Transactions Route
    Route::get('deposit/history', 'TransactionController@deposit_history')->name('deposit_history');
    Route::get('withdrawal/history', 'TransactionController@withdrawal_history')->name('withdrawal_history');

});

include('admin.php');
