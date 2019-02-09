<?php

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

Route::get('/{any}', 'SpaController@index')->where('any', '.*');


Route::prefix('admin')->group(function() {
    Route::post('user', 'UserAdminController@save_user');
});

Route::prefix('auth')->group(function() {
    Route::post('login', 'AuthController@login');
});