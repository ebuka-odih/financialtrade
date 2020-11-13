<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomepageController@homeInvestPlan')->name('homepage');
Route::get('/why-ftm', 'HomepageController@why_ftm')->name('why_ftm');
Route::get('/contact-us', 'HomepageController@contact_us')->name('contact_us');

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

//    Transactions RouteTransactionController
    Route::get('withdrawal/history', 'WithdrawalController@withdrawal_history')->name('withdrawal_history');
    Route::get('withdrawal', 'WithdrawalController@make_withdrawal')->name('make_withdrawal');
    Route::post('withdrawal/send', 'WithdrawalController@make_withdrawal_store')->name('make_withdrawal_store');
    Route::get('withdrawal/cancel/{id}', 'WithdrawalController@cancel_withdraw')->name('cancel_withdraw');

    Route::get('deposit/', 'DepositsController@pick_plan')->name('pick_plan');
    Route::post('process_deposit/', 'DepositsController@process_deposit')->name('process_deposit');
    Route::get('deposit/{id}', 'DepositsController@make_deposit')->name('make_deposit');
    Route::get('deposits/history/', 'DepositsController@deposit_history')->name('deposit_history');
    Route::get('trades', 'TradesController@index')->name('trades.index');

    Route::get('validate', 'DepositsController@validateIpn');

});

include('admin.php');
