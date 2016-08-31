<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'LoginController@index');


Route::post('login-ajax-check', 'LoginController@ajax_check');

Route::get('logout', array('uses' => 'HomeController@doLogout'));

//Dashboard
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard/', 'DashboardController@index');
});


// User create,edit,list start

Route::group(['prefix' => 'admin'], function () {
    Route::get('user/', 'UserController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('user/add', 'UserController@add');
});
Route::group(['prefix' => 'admin'], function () {
    Route::post('user/ajax-add', 'UserController@ajax_add');
});
Route::group(['prefix' => 'admin'], function () {
    Route::post('user/exist-email-check', 'UserController@exist_email_check');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('user/edit/{id}', 'UserController@edit');
});
Route::group(['prefix' => 'admin'], function () {
    Route::post('user/ajax-edit', 'UserController@ajax_edit');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('user/exist-vcnumber-check', 'UserController@exist_vcnumber_check');
});
Route::group(['prefix' => 'admin'], function () {
    Route::post('user/change-users-active', 'UserController@change_users_active');
});
// User create,edit,list end

//Channel create,edit,list start
Route::group(['prefix' => 'admin'], function () {
    Route::get('channel/', 'ChannelController@index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('channel/change-channel-active', 'ChannelController@change_channel_active');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('channel/add', 'ChannelController@add');
});
Route::group(['prefix' => 'admin'], function () {
    Route::post('channel/ajax-add', 'ChannelController@ajax_add');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('channel/exist-channel-check', 'ChannelController@exist_channel_check');
});
//Channel create,edit,list end

Route::get('/form',function(){
   return view('login.test');
});