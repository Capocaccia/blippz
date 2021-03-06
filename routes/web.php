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

Route::prefix('blip')->group(function() {
    Route::post('save', 'BlipController@save');
    Route::post('all', 'BlipController@getAll');
    Route::post('delete', 'BlipController@delete');
    Route::post('markSafe', 'BlipController@markSafe');
});

Route::prefix('contact')->group(function() {
    Route::post('save', 'ContactController@save');
    Route::post('all', 'ContactController@getAll');
    Route::post('delete', 'ContactController@delete');
});