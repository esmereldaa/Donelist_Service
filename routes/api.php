<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatalistController;

use App\Models\DataListModel;
use App\Models\User;

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
    Route::get('getData', 'DatalistController@alldatalist');
    Route::get('getData2', function(){
        $datas = User::all();
        return response($datas);
    });
    Route::get('getData3', [DatalistController::class, 'alldatalist']);
    Route::post('createAccount', 'DatalistController@createAccount');
    Route::post('login', 'DatalistController@login');
    Route::group(['prefix' => '{token}'], function () {
        Route::get('getData', 'DatalistController@getData');
        Route::get('getUser', 'DatalistController@getUser');
        Route::post('setData', 'DatalistController@setData');
    });
});
