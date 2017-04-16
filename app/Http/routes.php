<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::post('/account/transfer/save','AccountController@transfer_save');
    Route::get('/account/transfer','AccountController@transfer');
    Route::post('/account/in/save','AccountController@in_save');
    Route::get('/account/in','AccountController@in');
    Route::post('/account/out/save','AccountController@out_save');
    Route::get('/account/out','AccountController@out');
    Route::get('/account','AccountController@index');
    Route::delete('card/{id}','CardController@delete');
    Route::post('card/save','CardController@save');
    Route::get('/card/change_pwd','CardController@change_pwd');
    Route::post('/card/save_pwd','CardController@save_pwd');

    Route::get('/card','CardController@index');
    Route::post('/information/save','InformationController@save');
    Route::get('/information/edit','InformationController@edit');
    Route::post('/information/update','InformationController@update');
    Route::get('/information','InformationController@index');
    Route::get('/history','HistoryController@index');

});

