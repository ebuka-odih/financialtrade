<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'verified', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('all-users', 'Admin\AdminController@users')->name('users');
    Route::resource('investment-plans', 'Admin\InvestPlansController');
    Route::get('user/details/{id}', 'Admin\AdminController@user_details')->name('user_details');
    Route::get('user/verify_user/{id}', 'Admin\AdminController@verify_user')->name('verify_user');

    Route::get('accept/withdrawal/{withdraw}', 'Admin\AdminWithdrawal@accept_withdrawal')->name('accept_withdrawal');
    Route::get('all-withdrawal', 'Admin\AdminWithdrawal@all_withdrawal')->name('all_withdrawal');
    Route::get('withdrawal/{id}/details', 'Admin\AdminWithdrawal@withdrawal_details')->name('withdrawal_details');

    Route::get('users/trades/{id}/', 'Admin\AdminController@list_orders')->name('list_orders');
    Route::get('create/trade/{id}', 'Admin\AdminController@create_order')->name('create_order');
    Route::post('create/trade/store', 'Admin\AdminController@create_order_store')->name('create_order_store');
    Route::get('edit/trade/{id}', 'Admin\AdminController@edit_trade')->name('edit_trade');
    Route::patch('trade/{id}/update', 'Admin\AdminController@update_trade')->name('update_trade')->where('id', '[0-9]+');
    Route::delete('trade/{id}/delete', 'Admin\AdminController@delete_trade')->name('delete_trade')->where('id', '[0-9]+');

    Route::get('all-user-withdraw/{id}', 'Admin\AdminWithdrawal@show_user_withdraw')->name('user_withdraw.show')->where('id', '[0-9]+');

    Route::get('accept/deposit/{deposit}', 'Admin\AdminDeposit@approve_deposit')->name('approve_deposit');
    Route::get('all-deposit', 'Admin\AdminDeposit@all_deposits')->name('all_deposits');
    Route::get('deposit/{id}/details', 'Admin\AdminDeposit@deposit_details')->name('deposit_details');
    Route::post('deposit/send-bonus/{id}', 'Admin\AdminController@fund_acct')->name('fund_acct.store');
    Route::post('deposit/defund/{id}', 'Admin\AdminController@defund_acct')->name('defund_acct');
    Route::delete('user/{id}/delete', 'Admin\AdminController@delete_user')->name('delete_user')->where('id', '[0-9]+');
    Route::get('user/deposits/{id}', 'Admin\AdminDeposit@user_deposits')->name('user_deposits')->where('id', '[0-9]+');

    Route::get('setting', 'Admin\SettingController@create')->name('setting.create');
    Route::post('setting/start_amount', 'Admin\SettingController@start_amount')->name('start_amount');
    Route::post('setting/store', 'Admin\SettingController@store')->name('setting.store');
    Route::post('setting/qrcode/store', 'Admin\SettingController@qr_code')->name('qrcode');

//    Route::get('dashboard2', 'admin.dashboard');
//    Messages Route
    Route::get('user/profile/message/{id}', 'Admin\NotifyController@index')->name('user_message')->where('id', '[0-9]+');
    Route::get('user/message/create/{id}', 'Admin\NotifyController@create')->name('create');
    Route::post('user/message/store', 'Admin\NotifyController@store')->name('mesg_store');
    Route::get('user/message/details/{id}', 'Admin\NotifyController@show')->name('msg_show');





});
