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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function () {
    Route::get('/getData', 'App\Http\Controllers\DatalistController@alldatalist');
    Route::post('/createAccount', 'App\Http\Controllers\DatalistController@createAccount');
    Route::post('/login', 'App\Http\Controllers\DatalistController@login');
    Route::group(['prefix' => '{token}'], function () {
        Route::get('/getData', 'App\Http\Controllers\DatalistController@getData');
        Route::get('/getUser', 'App\Http\Controllers\DatalistController@getUser');
        Route::post('/setData', 'App\Http\Controllers\DatalistController@setData');
    });
});
