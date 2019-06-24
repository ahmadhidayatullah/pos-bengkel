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

Auth::routes();

$all_user = [
    // 'prefix' => '/dashboard',
    'middleware' => ['auth'],
];

Route::group($all_user, function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('user')->middleware('isAdmin');
        Route::get('/create', 'UserController@create')->name('user.create')->middleware('isAdmin');
        Route::get('/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/', 'UserController@store')->name('user.create.submit')->middleware('isAdmin');
        Route::put('/{id}', 'UserController@update_general')->name('user.update.general');
        Route::put('/password/{id}', 'UserController@update_password')->name('user.update.password');
        Route::delete('/{id}', 'UserController@destroy')->name('user.delete')->middleware('isAdmin');
    });
});
