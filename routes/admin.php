<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('all-users', 'Admin\AdminController@users')->name('users');
    Route::resource('investment-plans', 'Admin\InvestPlansController');
    Route::get('user/details/{id}', 'Admin\AdminController@users_details')->name('users_details');
    Route::get('user/verify_user/{id}', 'Admin\AdminController@verify_user')->name('verify_user');

    Route::get('accept/withdrawal/{withdraw}', 'Admin\AdminWithdrawal@accept_withdrawal')->name('accept_withdrawal');
    Route::get('all-withdrawal', 'Admin\AdminWithdrawal@all_withdrawal')->name('all_withdrawal');
    Route::get('withdrawal/{id}/details', 'Admin\AdminWithdrawal@withdrawal_details')->name('withdrawal_details');

    Route::get('users/trades/{id}', 'Admin\AdminController@list_orders')->name('list_orders');
    Route::get('create/trade/{id}', 'Admin\AdminController@create_order')->name('create_order');
    Route::post('create/trade/store', 'Admin\AdminController@create_order_store')->name('create_order_store');
    Route::get('edit/trade/{id}', 'Admin\AdminController@edit_trade')->name('edit_trade');
    Route::patch('trade/{id}/update', 'Admin\AdminController@update_trade')->name('update_trade')->where('id', '[0-9]+');
    Route::delete('trade/{id}/delete', 'Admin\AdminController@delete_trade')->name('delete_trade')->where('id', '[0-9]+');

    Route::get('all-user-withdraw/{id}', 'Admin\AdminController@show_user_withdraw')->name('user_withdraw.show')->where('id', '[0-9]+');



});
