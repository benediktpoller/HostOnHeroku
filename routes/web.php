<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('api/v1')->group(function () {
    Route::get('monitors', 'MonitorController@all');
    Route::post('monitors', 'MonitorController@add');
    Route::get('monitors/{id}', 'MonitorController@get');
    Route::put('monitors/{id}', 'MonitorController@update');
    Route::delete('monitors/{id}', 'MonitorController@delete');

    // accounts 
    // email, monitor_limit_max_number, min_monitor_interval (sec)
    // up_monitors, down_monitors, paused_monitors


    // monitors
    // id, name, url, type, sub_type, ue, keyword_type, keyword_value
    // http_usernaem, http_password, auth_type, port, interval, status, all_time_uptime_ratio
    // all_time_uptime_durations, custom_uptime_ratios

    // alert contacts
    Route::get('contacts', 'ContactsController@all');
    Route::post('contacts', 'ContactsController@add');
    Route::get('contacts/{id}', 'ContactsController@get');
    Route::put('contacts/{id}', 'ContactsController@update');
    Route::delete('contacts/{id}', 'ContactsController@delete');

    Route::get('accounts', 'AccountsController@index');
    Route::post('accounts', 'AccountsController@add');
    Route::get('accounts/{id}', 'AccountsController@get');
    Route::put('accounts/{id}', 'AccountsController@update');
    Route::delete('accounts/{id}', 'AccountsController@delete');



    Route::get('user', 'UserController@show');
    Route::put('user/{id}', 'UserController@update');

    Route::get('mail', 'MailController@show');
});
