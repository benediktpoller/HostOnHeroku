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

Route::get('/api/monitors', function () {
    return response()
        ->json([
            ['id' => '1', 'name' => 'AVL', 'url' => 'https://www.avl.com'],
            ['id' => '2', 'name' => 'ASFINAG', 'url' => 'https://asfinag.at']
        ]);
});