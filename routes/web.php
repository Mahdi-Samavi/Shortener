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

Route::get('/', 'BaseController@index')->name('home');

Route::get('/verify-email', 'VerifyController')->name('verify');
Route::get('/verify/{token}', 'VerifyController@verifying')->name('verifying');

Route::group(['prefix' => 'link', 'as' => 'link.'], function () {
    Route::get('views', 'LinkController@views')->name('views');
    Route::get('create', 'LinkController@create')->name('create');
    Route::post('store', 'LinkController@store')->name('store');
    Route::delete('delete/{id}', 'LinkController@delete')->name('delete');
});

Route::get('/{shortened_id}', 'LinkController@index')
    ->name('redirect-to-link')
    ->where('shortened_id', '[0-9]+');
