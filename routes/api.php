<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\APIAuthController@login');
    Route::post('logout', 'Auth\APIAuthController@logout');
    Route::post('refresh', 'Auth\APIAuthController@refresh');
    Route::post('me', 'Auth\APIAuthController@me');
});

// Route::group(['middleware' => 'api'], function($router) {
    Route::resource('lotteries', 'LotteryController');
    Route::resource('streams', 'StreamController');
    Route::resource('users', 'UserController');
// });
