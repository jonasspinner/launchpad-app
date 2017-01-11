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

Route::get('/', 'DashboardController@index');

// user
Route::resource('user', 'SlackUserController');

// import from slack
Route::get('/slack', 'DashboardController@slack');

// opening/closing
Route::resource('opening-times', 'OpeningTimeController');
Route::get('api/opening-times/current', 'OpeningTimeController@apiCurrent');

Route::get('api/door/change-status', 'DoorController@changeStatusLegacy');
Route::get('door/change-status', 'DoorController@changeStatus');

// presence-tracker
Route::group(['prefix' => 'api/presence-tracker'], function () {
    Route::resource('activities', 'PTActivityController', ['only' => [
        'index', 'store'
    ]]);
    Route::resource('devices', 'PTDeviceController', ['only' => [
        'store'
    ]]);
    Route::resource('clients', 'PTClientController', ['only' => [
        'store'
    ]]);
    Route::resource('users.devices', 'PTUserDeviceController', ['only' => [
        'store'
    ]]);
});
