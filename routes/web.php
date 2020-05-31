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

Route::get('mail', 'MailController@show');

Route::prefix('api/v1')->group(function () {
    Route::get('sites', 'SiteController@index');
    Route::post('sites', 'SiteController@add');
    Route::get('sites/{id}', 'SiteController@get');
    Route::put('sites/{id}', 'SiteController@update');
    Route::delete('sites/{id}', 'SiteController@delete');
});