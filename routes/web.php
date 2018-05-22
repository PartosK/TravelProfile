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
Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/editEmail', 'ProfileEmail@getEditEmail')->name('editEmail');
    Route::post('/editEmail', 'ProfileEmail@postEditEmail')->name('editEmail');
    Route::post('/delEmail', 'ProfileEmail@postDelEmail')->name('delEmail');
    Route::post('/mainEmail', 'ProfileEmail@postMainEmail')->name('mainEmail');

    Route::get('/editPhone', 'ProfilePhone@getEditPhone')->name('editPhone');
    Route::post('/editPhone', 'ProfilePhone@postEditPhone')->name('editPhone');
    Route::post('/delPhone', 'ProfilePhone@postDelPhone')->name('delPhone');
    Route::post('/mainPhone', 'ProfilePhone@postMainPhone')->name('mainPhone');

    Route::post('/editFio', 'FioController@postEditFio')->name('editFio');

    Route::post('/delUser', 'HomeController@postDelUser')->name('delUser');
});
Auth::routes();